<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialUser;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    public function auth(){
        return view('auth.social');
    }

    public function redirect(string $provider){
        return Socialite::driver($provider)->redirect();
    }


    public function callback(){
        try {
        
            $user = Socialite::driver('facebook')->user();
        
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
        
                Auth::login($finduser);
        
                return redirect()->intended('dashboard');
        
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'facebook_id'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('dashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

