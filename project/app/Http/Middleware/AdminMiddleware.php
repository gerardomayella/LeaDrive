<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin')) {
            return redirect()->route('admin.login')->withErrors(['access' => 'Anda harus login sebagai admin.']);
        }

        return $next($request);
    }
}
