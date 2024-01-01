<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Faz a autenticação e gera o token
        $token = auth('api')->attempt($request->all(['email', 'password']));
        if ($token) {
            return response()->json(["token" => $token]);
        }
        return response()->json(['erro'=> 'Usuário ou senha inválido'], 403);
    }

    public function logout(Request $request)
    {
        return 'logout';
    }

    public function refresh(Request $request)
    {
        return 'refresh';
    }

    public function me(Request $request)
    {
        return 'me';
    }
}
