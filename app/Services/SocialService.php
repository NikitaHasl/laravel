<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as ModelsUser;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    public function userInit(User $user): bool
    {
        $userData = ModelsUser::where(['email' => $user->getEmail()])->first();
        if ($userData) {
            //auth user
            $userData->name = $user->getName();
            $userData->avatar = $user->getAvatar();
            if ($userData->save()) {
                Auth::loginUsingId($userData->id);
                return true;
            }
        } else {
            //register
        }
        throw new Exception('Не удалось сохранить пользователя');
    }
}
