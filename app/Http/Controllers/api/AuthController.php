<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\RegisterFormRequest;
use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Claims\JwtId;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('api');
    }
    public $loginAfterSignUp = true;

    public function Register(RegisterFormRequest $request)
    {
        
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


          
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */



     
public function editProfile(Request $request){
        $user =auth()->user();
        $user->update([
        'f_name' => $request->f_name,
        'l_name' => $request->l_name,
        'mobile_number'=>$request->mobile_number,
    ]);
    return response()->json(['message' => 'Successfully edit your profile']);
        }




        public function editAddress(Request $request){
            $user =auth()->user();
            $user->update([
            'governerate' => $request->governerate,
            'area' => $request->area,
            'street' => $request->street,
            'building' => $request->building,
            'floor' => $request->floor,
            'flat_number' => $request->flat_number,
        ]);
        return response()->json(['message' => 'Successfully edit your profile']);
            }



            public function changePassword(Request $request){
                $user =auth()->user();
                $old_password=bcrypt(auth()->user()->password);
                if($old_password = bcrypt($request->old_password)) {
                               
                $user->update([
             
                'password' => bcrypt($request->password),
              
               
            ]);
      
            return response()->json(['message' => 'Successfully edit your profile']);
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
