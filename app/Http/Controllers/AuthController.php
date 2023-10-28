<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth; // Agrega la importación
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Validación de los datos
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);
    
            // Creación del usuario
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            //creacion toke jwt 

            $token=  JWTAuth::fromUser($user);
    
            // Respuesta con el usuario recién creado
            return response()->json([
                'message' => 'Usuario creado exitosamente',
                'user' => $user,
                'token' => $token
            ], 200);
        } catch (\Exception $e) {
            // Capturar cualquier excepción ocurrida durante el proceso
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        try{
            //validar credenciales


            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 400);
            }

        }catch(JWTException $e){
            return response()->json(['error' => 'Error no se ha creado el token'], 500);
        }

        $user = JWTAuth::user();
        return response()->json([
            'message' => 'Login OK',
            'user_id' => $user->id,
            'token' => $token
        ], Response::HTTP_OK)->withCookie('cookie_token', $token, 60*24);
    }

    public function userProfile(Request $request) {
        return response()->json([
            "message" => "userProfile OK",
            "userData" => auth()->user()
        ], Response::HTTP_OK);
    }
    
    public function logout() {
        $cookie = Cookie::forget('cookie_token');
        return response(["message"=>"Cierre de sesión OK"], Response::HTTP_OK)->withCookie($cookie);
    }

    public function allUsers() {
       $users = User::all();
       return response()->json([
        "users" => $users
       ]);
    }


    
}
