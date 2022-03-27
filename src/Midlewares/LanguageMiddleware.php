<?php

namespace Cirelramos\Languages\Middlewares;

use Cirelramos\Languages\Services\LanguageService;
use Closure;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class LocalizationMiddleware
 * @package App\Http\Middleware
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

        // get the response after the request is done
        $response = $next($request);

        // set Content Languages header in the response
        $response->headers->set('Content-Language', $locale);

        // return the response
        return $response;
    }
}





