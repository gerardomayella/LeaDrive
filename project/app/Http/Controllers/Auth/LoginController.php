<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // ...existing code...

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
        }

        return redirect('/dashboard'); // Redirect ke dashboard pengguna biasa
    }

    // ...existing code...
}