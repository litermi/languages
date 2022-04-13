<?php

namespace Litermi\Languages\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

/**
 *
 */
class LanguageService
{
    /**
     * @param $request
     * @param $app
     * @param $language
     * @return mixed|null
     */
    public function execute($request, $app = null, $language = null)
    {
        $locale      = null;
        $localeForce = null;
        // read the language from the request header
        if(empty($language) === true){
            $locale      = $request->header('Content-Language');
            $localeForce = $request->header('force-not-change-language');
        }

        if(empty($language) === false){
           $locale = $language;
        }
        if ($localeForce != null) {
            $locale = $localeForce;
        }

        if ($app !== null) {
            // if the header is missed
            if ( !$locale) {
                // take the default local language
                $locale = $app->config->get('app.locale');
            }

            // check the languages defined is supported
            if ( !array_key_exists($locale, config('languages.available'))) {
                // respond with error
                return abort(Response::HTTP_FORBIDDEN, "Language '{$locale}' not supported.");
            }

            // set the local language
            $app->setLocale($locale);
        } else {
            App::setLocale($locale);
        }

        return $locale;

    }
}
