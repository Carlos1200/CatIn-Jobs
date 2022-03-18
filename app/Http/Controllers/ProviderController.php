<?php

namespace App\Http\Controllers;

use App\Models\Gender;
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
    
                return redirect()->intended('home');
    
            }else{
                $userEncode = json_encode([
                    'name'     => $user->name,
                    'email'    => $user->email,
                    'provider_id' => $user->id,
                    'provider' => $provider,
                ]);
                // $genders=Gender::all();
                return view('auth.registerRole', compact('userEncode'));
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
