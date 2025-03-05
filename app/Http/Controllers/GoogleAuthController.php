<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $new_user = User::updateOrCreate(['email' => $google_user->getEmail()], [
                    'name' => $google_user->getName(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);
            } else {
                Auth::login($user);
            }

            return redirect()->intended('panel/dashboard');
        } catch (Exception $e) {
            Log::error('Google login error: ' . $e->getMessage());
            return redirect()->route('/login')->with('error', 'Unable to login with Google. Please try again.');
        }
    }
}
