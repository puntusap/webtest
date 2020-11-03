<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Auth\Authenticatable;

class SocialController extends Controller
{
    public function index()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback()
    {
        $user=Socialite::driver('vkontakte')->user();
        $objSocial=new SocialService();
        if ($user=$objSocial->saveSocial($user))
        {
            Auth::login($user);
            return redirect()->route('home');
        }

        return back();

    }
}
