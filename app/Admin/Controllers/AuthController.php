<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AuthController as BaseAuthController;

class AuthController extends BaseAuthController
{

    public function loginPage()
    {
        return view('landing.auth.login');
    }

    public function registerPage()
    {
        return view('landing.auth.register');
    }

    public function forgotPasswordPage()
    {
        return view('landing.auth.forgot-password');
    }


}
