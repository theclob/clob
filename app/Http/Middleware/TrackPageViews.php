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
            $referer = $request->header('referer');
            $language = $request->header('accept-language');
            $clientId = md5($ip . $userAgent);

            $gamp = GAMP::setClientId($clientId);
            $gamp->setDocumentPath($request->path());
            if($ip) $gamp->setIpOverride($ip);
            if($userAgent) $gamp->setUserAgentOverride($userAgent);
            if($referer) $gamp->setDocumentReferrer($referer);
            if($language) $gamp->setUserLanguage($language);

            // TODO send document title (need to determine based on current request)

            if($request->query('utm_campaign')) $gamp->setCampaignName($request->query('utm_campaign'));
            if($request->query('utm_source')) $gamp->setCampaignSource($request->query('utm_source'));
            if($request->query('utm_medium')) $gamp->setCampaignMedium($request->query('utm_medium'));
            if($request->query('utm_keyword')) $gamp->setCampaignKeyword($request->query('utm_keyword'));
            if($request->query('utm_content')) $gamp->setCampaignContent($request->query('utm_content'));
            if($request->query('utm_id')) $gamp->setCampaignId($request->query('utm_id'));

            $gamp->sendPageView();
        }

        return $next($request);
    }
}
