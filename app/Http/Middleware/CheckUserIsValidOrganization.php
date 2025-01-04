<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIsValidOrganization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userIsValidOrganization = auth()->user()->is_valid_organisation;

        if (auth()->check() && $userIsValidOrganization) {
            return $next($request);
        }

        return redirect(url('dashboard/volunteer/'));
    }
}
