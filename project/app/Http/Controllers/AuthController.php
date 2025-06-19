<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showAdminLogin()
    {
        return view('auth.admin-login'); // View for admin login
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === 'admin123') {
            return redirect()->route('admin.dashboard');
        }
        //return redirect()->route('admin.dashboard');
        return redirect()->route('login')->withErrors(['email' => 'Anda bukan admin, silahkan login pada halaman login awal']);
    }
}
