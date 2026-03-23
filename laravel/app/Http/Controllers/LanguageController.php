<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        if (in_array($lang, ['en', 'ur', 'ar'])) {
            Session::put('locale', $lang);
        }
        return redirect()->back();
    }
}   