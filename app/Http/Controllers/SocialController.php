<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init(string $driver = 'vkontakte')
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Social $social, string $driver = 'vkontakte')
    {
        $social->userInit(Socialite::driver($driver)->user());

        return redirect()->route('account');
    }
}
