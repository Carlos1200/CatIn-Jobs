<?php

namespace App\Http\Controllers;

use App\Models\Company_Information;
use App\Models\Gender;
use App\Models\Personal_Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){

        $user_id = Auth::user()->id;
        $user= User::select('users.name','personal_information.nationality','personal_information.about_me')->join('personal_information','personal_information.id','=','users.id_information')->where('users.id',$user_id)->get();
        return view('profile',compact('user'));
    }

    public function registerRole(){
        $role=$_POST['role'];
        $user=$_POST['user'];
        
        if($role=='user'){
            $genders=Gender::all();
            return view('auth.registerProvider',compact('user','role','genders'));
        }else{
            return view('auth.register-company',compact('user','role'));
        }
    }
    
    public function providerRegister(){
        $user=json_decode($_POST['user']);
        $role=$_POST['role'];

        if($role=='user'){

            $info= Personal_Information::create([
                'genders_id'=>$_POST['gender'],
                'birthday'=>$_POST['birthday'],
                'nationality'=>$_POST['nationality'],
                'phone_contact'=>$_POST['phone_contact'],
            ]);

            $newUser=User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => encrypt('123456dummy'),
                'provider_id' => $user->provider_id,
                'provider' => $user->provider,
                'id_information'=>$info->id,
            ]);
            Auth::login($newUser);
        }else{
            $newUser=User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => encrypt('123456dummy'),
                'provider_id' => $user->provider_id,
                'provider' => $user->provider,
                'rol'=>$role,
            ]);

            Company_Information::create([
                'company_name'=>$_POST['company_name'],
                'work_area'=>$_POST['work_area'],
                'location'=>$_POST['location'],
                'information'=>$_POST['information'],
                'number_employees'=>$_POST['number_employees'],
                'user_id'=>$newUser->id,
            ]);
            Auth::login($newUser);
        }

        return redirect()->intended('home');
    }
}
