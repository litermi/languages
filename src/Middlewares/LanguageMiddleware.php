<?php

namespace Litermi\Languages\Middlewares;

use Litermi\Languages\Services\LanguageService;
use Closure;
use Illuminate\Contracts\Foundation\Application;

/**
 *
 */
class LanguageMiddleware
{
    /**
     * @param Application     $app
     * @param LanguageService $languageService
     */
    public function __construct(Application $app, private LanguageService $languageService)
    {

        $this->app             = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $locale = $this->languageService->execute($request, $this->app);

        $request->headers->set('Content-Language', $locale);

        // get the response after the request is done
        $response = $next($request);

        // set Content Languages header in the response
        $response->headers->set('Content-Language', $locale);

        // return the response
        return $response;
    }
}





