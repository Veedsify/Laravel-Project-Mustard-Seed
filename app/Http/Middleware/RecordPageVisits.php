<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RecordPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pageVisit = new PageVisit();
        $pageVisit->url = $request->url();
        $pageVisit->ip = $request->ip();
        $pageVisit->user_agent = $request->userAgent();
        $pageVisit->referrer = $request->header('referer');
        $pageVisit->device = $request['Sec-Ch-Ua-Platform'] ?? 'Unknown';
        $pageVisit->browser = $request['User-Agent'] ?? 'Unknown';
        $pageVisit->platform = $request['Sec-Ch-Ua:'] ?? 'Unknown';
        $pageVisit->country = "Unknown";
        $pageVisit->city = "Unknown";
        $pageVisit->state = "Unknown";
        $pageVisit->timezone = "Unknown";;
        $pageVisit->save();
        return $next($request);
    }
}
