<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        dd('hola');
        //validar el registro
        $data = $request->validated();
    }

    public function login(RegistroRequest $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
