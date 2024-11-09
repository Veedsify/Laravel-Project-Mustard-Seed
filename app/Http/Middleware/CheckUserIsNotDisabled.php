<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class CheckUserIsNotDisabled
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
        $user = Auth::user();
        if ($user->admin_approved == 0) {
            Auth::logout();
            return redirect('/login')->with('error', 'Your account has been disabled. Please contact admin for more information.');
        }
        return $next($request);
    }
}
