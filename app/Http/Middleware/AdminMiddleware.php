<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return $next($request);
        }
        return redirect()->route('admin.login.form')->with('error', 'Unauthorized access.');
    }}