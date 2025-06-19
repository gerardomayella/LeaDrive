<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => null,
            'remember_token' => null,
            'role' => 'user',
        ]);

        return redirect('/')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin');
            }
            return redirect('/dashboard')->with('success', 'Login berhasil.');
        } 

        return back()->withErrors(['login' => 'Username atau password salah, silakan coba lagi']);
    }

    public function logout()    
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda telah logout');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
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

        return back()->withErrors(['login' => 'Email atau password salah, silakan coba lagi']);
    }

    public function adminLogout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login')->with('success', 'Anda telah logout');
    }
}
