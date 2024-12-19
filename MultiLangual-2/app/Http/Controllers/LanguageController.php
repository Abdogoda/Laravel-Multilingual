<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function __invoke(string $language)
    {
        if(!in_array($language, config("app.available_locales"))){
            $language = config('app.fallback_locale');
        }
        session(['app_locale' => $language]);
        App::setLocale($language);
        return back();
    }
}