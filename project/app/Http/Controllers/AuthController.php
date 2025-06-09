<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    protected $supabaseUrl;
    protected $supabaseKey;

    public function __construct()
    {
        $this->supabaseUrl = config('services.supabase.url');
        $this->supabaseKey = config('services.supabase.key');
    } 

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        try {
            // 1. Register ke Supabase
            $response = Http::withHeaders([
                'apikey' => $this->supabaseKey,
                'Authorization' => 'Bearer ' . $this->supabaseKey,
            ])->post("{$this->supabaseUrl}/auth/v1/signup", [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if (!$response->successful()) {
                $error = $response->json();
                \Log::error('Supabase registration failed', ['error' => $error]);
                return back()->withErrors(['register' => 'Registrasi gagal di Supabase.']);
            }

            $supabaseUser = $response->json()['user'];

            // Log provider untuk memastikan
            if (isset($supabaseUser['provider']) && $supabaseUser['provider'] === 'email') {
                \Log::info('User registered with provider: email', ['user' => $supabaseUser]);
            } else {
                \Log::warning('Unexpected provider during registration', ['user' => $supabaseUser]);
            }

            // 2. Simpan ke tabel `users` lokal
            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'uuid' => $supabaseUser['id'], // ini adalah UUID Supabase
                'role' => 'user',
            ]);

            return redirect('/')->with('success', 'Registrasi berhasil. Silakan login.');
        } catch (\Exception $e) {
            \Log::error('Error during registration', ['exception' => $e]);
            return back()->withErrors(['register' => 'Terjadi kesalahan saat registrasi.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        try {
            // 1. Login ke Supabase Auth
            $response = Http::withHeaders([
                'apikey' => $this->supabaseKey,
                'Authorization' => 'Bearer ' . $this->supabaseKey,
            ])->post("{$this->supabaseUrl}/auth/v1/token?grant_type=password", [
                'email' => $credentials['email'],
                'password' => $credentials['password'],
            ]);

            if (!$response->successful()) {
                $error = $response->json();
                \Log::warning('Supabase login failed', ['error' => $error]);
                return back()->withErrors(['login' => 'Email atau password salah.']);
            }

            $data = $response->json();
            $supabaseUserId = $data['user']['id'];

            // 2. Temukan user lokal berdasarkan uuid
            $user = User::where('uuid', $supabaseUserId)->first();

            if (!$user) {
                \Log::warning('Local user not found', ['uuid' => $supabaseUserId]);
                return back()->withErrors(['login' => 'Akun tidak ditemukan di sistem lokal.']);
            }

            // 3. Login ke Laravel Auth
            Auth::login($user);

            return redirect('/dashboard')->with('success', 'Login berhasil.');
        } catch (\Exception $e) {
            \Log::error('Error during login', ['exception' => $e]);
            return back()->withErrors(['login' => 'Terjadi kesalahan saat login.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
