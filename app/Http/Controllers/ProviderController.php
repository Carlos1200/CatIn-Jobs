<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleProviderCallback($provider){
        try {
            $user = Socialite::driver($provider)->user();

            $finduser = User::where('provider_id', $user->id)->first();
            if($finduser){
        
                Auth::login($finduser);
    
                return redirect()->intended('dashboard');
    
            }else{
                $newUser = User::create([
                    'name'     => $user->name,
                    'email'    => $user->email,
                    'provider' => $provider,
                    'password' => encrypt('123456dummy'),
                    'provider_id' => $user->id,
                    
                ]);
              

                 Auth::login($newUser);
        
                 return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
