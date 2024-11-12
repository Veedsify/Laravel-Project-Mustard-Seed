<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIsIdVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // if request is logout then allow
        if ($request->path() === 'user/logout' && $request->isMethod('post')) {
            return $next($request);
        }
        
        // if request is for verification page then allow
        $user = Auth::user();
        if (!$user || !$user->idVerified) {
            return redirect('/user/verification')->with('error', 'You have not started your face verification process.');
        }
        if (!$user->idVerified->verification_status) {
            return redirect('/user/verification')->with('error', 'Your face verification is still pending. Please wait for the verification to complete.');
        }
        return $next($request);
    }
}
