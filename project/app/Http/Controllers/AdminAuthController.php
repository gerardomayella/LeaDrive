<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = DB::table('Instruktur')->where('email', $request->email)->first();

        if ($admin && $request->password === 'admin123') { 
            session(['admin' => $admin]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['login' => 'Email atau password salah.']);
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login')->with('success', 'Anda telah logout.');
    }
}
