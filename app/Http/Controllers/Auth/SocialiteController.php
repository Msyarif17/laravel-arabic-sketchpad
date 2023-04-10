<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SocialAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        $user = Socialite::driver('google')->stateless()->user();
        // dd($user->avatar);
        $finduser = User::where('google_id', $user->id)->first();
        // dd($finduser);
        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/profile');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'avatar' => $user->avatar,
                'username' => $user->nickname,
                'password' => \bcrypt(Carbon::now())
            ]);
            $newUser->assignRole('User');
            Auth::login($newUser);

            return redirect()->to('/complete-registration');
        }
    }
}
