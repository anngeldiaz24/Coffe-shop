<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{

    public function register(RegistroRequest $request)
    {
        //validar el registro
        $data = $request->validated();

        //crear usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), 
        ]); 

        //Retornar una respuesta
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        
        //Revisar el password
        //retornamos una respuesta 422 para obligar al usuario a hacer cambios
        if (!Auth::attempt($data)) {
           return response([
                'errors' => ['The email or password is incorrect']
           ], 422);
        }

        //Autenticar al usuario
        $user = Auth::user();

        //Retornar una respuesta
        return [
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];
        
    }

    public function logout(Request $request)
    {

    }
}
