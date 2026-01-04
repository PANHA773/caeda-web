<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Switch site language (stores locale in session)
     */
    public function switch(Request $request)
    {
        $lang = $request->input('lang');
        if (in_array($lang, ['en', 'kh'])) {
            session(['lang' => $lang]);
            app()->setLocale($lang);
        }

        return redirect()->back();
    }
}
