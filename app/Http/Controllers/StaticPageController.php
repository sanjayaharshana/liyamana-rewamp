<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function termsAndConditions()
    {
        return view('landing.statics-pages.terms-and-conditions');
    }

    public function privacyPolicy()
    {
        return view('landing.statics-pages.privacy-policy');
    }

    public function refundPolicy()
    {
        return view('landing.statics-pages.refund-policy');
    }

    public function cookiePolicy()
    {
        return view('landing.statics-pages.cookies-policy');
    }
}
