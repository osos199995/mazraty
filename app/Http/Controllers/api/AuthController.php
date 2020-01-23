<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\RegisterFormRequest;
use App\Http\Resources\UsersResource;
use App\User;
use http\Env\Response;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Claims\JwtId;

class AuthController extends Controller
{
//use SendsPasswordResetEmails;
//use ResetsPasswords;
    public function __construct()
    {
        $this->middleware('api');
    }
    public $loginAfterSignUp = true;

    public function Register(RegisterFormRequest $request)
    {
        $random=rand(4000,4999);
        $user = User::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile_number'=>$request->mobile_number,
            'telephone'=>$request->telephone,
            'governerate'=>$request->governerate,
            'area'=>$request->area,
            'streeet'=>$request->street,
            'building'=>$request->building,
            'floor'=>$request->floor,
            'flat_number'=>$request->flat_number,
            'verify'=>$random,

          
        ]);

//        $basic  = new \Nexmo\Client\Credentials\Basic('d518f7a5', 'v6nrDgRGricSXeCa');
////        $client = new \Nexmo\Client($basic);
////        $message = $client->message()->send([
////            'to' => $request->mobile_number,
////            'from' => 'mazraty',
////            'text' => 'Hello from mazraty your verification code' . $random,
////        ]);
///
///
///
///
//        $token = auth()->login($user);
//        return $this->respondWithToken($token);
        return response()->json(['message'=>'your registered successfully',200]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

public function verify(Request $request ,$id){
    $user =User::where('id',$id)->first();
    if($user->is_verified == 0){
        $user->update([
            'is_verified'=>1,
        ]);
        return response()->json(['message'=>'you verified successfully',200]);
    }
    return response()->json(['message'=>'you already verified',200]);
}

     
public function editProfile(Request $request){

        $user =User::where('id',auth()->user()->id)->first();
        $user->update([
        'f_name' => $request->f_name,
        'l_name' => $request->l_name,
//        'mobile_number'=>$request->mobile_number,
    ]);
    return response()->json(['message' => 'Successfully edit your profile']);
        }




        public function editAddress(Request $request){
            $user =User::where('id',auth()->user()->id)->first();
            $user->update([
            'governerate' => $request->governerate,
            'area' => $request->area,
            'street' => $request->street,
            'building' => $request->building,
            'floor' => $request->floor,
            'flat_number' => $request->flat_number,
        ]);
            return response()->json(['message' => 'Successfully edit your address']);
            }

            public function changePassword(Request $request)
            {
                $currentuserpassword = User::where('id', auth()->user()->id)->first();

                if (Hash::check($request['old_password'],Auth::user()->password)  ){

                    $user = User::where('id', auth()->user()->id)->first();
                $user->update([
                    'password' => bcrypt($request->password),


                ]);
                return response()->json(['message' => 'Successfully your password changed']);
            }
        return response()->json(['message' => 'your password is wrong']);
    } 

    public function login()
    {
        
        $credentials = request(['mobile_number', 'password']);

        if (! $token =\JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }




    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        
            return response()->json(auth()->user()) ;
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**forget password
     *
     *
     *
     */
    public function forgot(Request $request){


        $user=User::where('mobile_number',$request->mobile_number)->first();
        $randompassword=rand(800000,899999);
        $user->update([
            'password'=>bcrypt($randompassword),
        ]);
//        $basic  = new \Nexmo\Client\Credentials\Basic('d518f7a5', 'v6nrDgRGricSXeCa');
//        $client = new \Nexmo\Client($basic);
//         $message = $client->message()->send([
//            'to' => $request->mobile_number,
//            'from' => 'mazraty',
//            'text' => 'Hello from mazraty your new password' . $randompassword,
//        ]);

        return response()->json(['message' => 'Successfully password send and changed']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
