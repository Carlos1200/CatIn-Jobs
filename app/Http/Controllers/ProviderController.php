<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Gender;
>>>>>>> main
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
    
<<<<<<< HEAD
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
=======
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
>>>>>>> main
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
