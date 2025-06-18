<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
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

        return redirect()->route('login')->withErrors(['email' => 'Anda bukan admin, silahkan login pada halaman login awal']);
    }
}
