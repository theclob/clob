<?php

namespace Clob\Http\Middleware;

use Closure;
use Irazasyed\LaravelGAMP\Facades\GAMP;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Use Google Analytics Measurement Protocol to track
        // page views and visits without client-side tracking

        // Only triggers if tracking ID enviornment variable configured
        if(config('gamp.tracking_id')) {
            // To track visits and bounce rates we need to create a
            // unique client ID per visitor. We'll use a MD5 hashed
            // combination of IP address and User Agent to do this.
            $ip = $request->ip();
            $userAgent = $request->header('User-Agent');
            $clientId = md5($ip . $userAgent);

            $gamp = GAMP::setClientId($clientId);
            $gamp->setDocumentPath($request->path());
            $gamp->sendPageView();
            $gamp->setIpOverride($ip);
        }

        return $next($request);
    }
}
