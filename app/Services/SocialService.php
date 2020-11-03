<?php


namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class SocialService
{
    public static function saveSocial($user)
    {

        $email=$user->getEmail();
        $name=$user->getName();
        $avatar=$user->getAvatar();

        $password=Hash::make('12345678');
        $u=User::where('email',$email)->first();
        if (!$u)
        {
            return User::create(['email'=>$email,'password'=>$password,'name'=>$name,'avatar'=>$avatar]);
        }

        return $u->fill(['name'=>$name]);
    }
}