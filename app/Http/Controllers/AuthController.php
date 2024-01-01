<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return 'login';
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
