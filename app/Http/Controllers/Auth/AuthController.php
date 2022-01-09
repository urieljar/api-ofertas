<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
//use Illuminate\Foundation\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
 
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
       $token = $user->createToken('token',$user->name)->plainTextToken;
       return response()->json([
           'ok'=> true,
           'access_token' => $token,
           'token_type' => 'Bearer',
           'message' => 'Login Success'
       ],200);

    }
    public function login(LoginRequest $request){
       
        if (Auth::attempt( $request->only('email', 'password'))){
            $user =User::where('email',$request['email'] )->firstOrFail();
            $token = $user->createToken($user->name)->plainTextToken;
            return response()->json([
                'ok'=> true,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Login Success'
            ],200);
        }else {
            return response()->json([
                'error' => [
                    'ok'=> false,
                    'msg' => 'Correo electronico o contraseña son incorrectos!! ',
                ],
            ],400);
        }
       /* $user = User::where('email', $request->email)->first();
        if ($user) {
            if(password_verify($request->password, $user->password)){
                return response()->json([
                'token' => $user->createToken($user->name)->plainTextToken,
                'message' => 'Login Success'
                ],200);
            }else {
                 return response()->json(array([
                'error'=>'Login Failed'
            ],401));
            }
        }*/
    }
    public function logout(Request $request){
        //$user =User::where('id', $request['id'] )->firstOrFail();
        $request->user()->tokens()->delete();
        //$request->user()->tokens()->where('id',$user->id)->delete();
        //$request->user()->currentAccessToken()->delete();
        return response()->json([
            'ok' => true,
            'menssage'=> 'Token eliminado Correctamente',
        ],200);
    }
    public function infoUser(Request $request){
        return response()->json([
            'data'=>$request->user(),
            'ok' =>true
        ],200);
    }
    public function actualizar(Request $request){
        
    }
}
