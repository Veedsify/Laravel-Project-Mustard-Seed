<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsVolunteer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!User::find(Auth::id())->hasRole('volunteer')) {
            return redirect(route('home'))->with('error', 'You are not Authorized to view this page');
        }

        if (User::find(Auth::id())->admin_approved == false) {
            return redirect(route('home'))->with('error', ('This ' . ucwords(Auth::user()->role) . ' Account Is Not Active, Please contact admin for futher instructions'));
        }

        return $next($request);
    }
}
