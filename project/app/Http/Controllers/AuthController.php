<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return redirect('/register');
    }

    public function login()
    {
        return redirect('/login');
    }

    public function logout()
    {
        return redirect('/logout');
    }
}
