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
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'age'=>$request->age,
            'mobile_number'=>$request->mobile_number,
            'gender_id'=>$request->gender_id,
        ]);

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

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
