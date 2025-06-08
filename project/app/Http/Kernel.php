<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // ...existing code...
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
    ];
}