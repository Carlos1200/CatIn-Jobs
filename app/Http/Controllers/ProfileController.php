<?php

namespace App\Http\Controllers;

use App\Models\Company_Information;
use App\Models\Gender;
use App\Models\Personal_Information;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){

        $user_id = Auth::user()->id;
        $user_role= Auth::user()->rol;
        if($user_role=='company'){
            $user=User::select('company_name','work_area','location','information','number_employees')->join('company_information','company_information.user_id','=','users.id')->where('users.id',$user_id)->get();
        }else{
            $user= User::select('users.name','personal_information.nationality','personal_information.about_me')->join('personal_information','personal_information.id','=','users.id_information')->where('users.id',$user_id)->get();
        }
        return view('profile',compact('user'));
    }

    public function registerRole(){
        $role=$_POST['role'];
        $user=$_POST['user'];
        
        Validator::make($_POST, [
            'role' => ['required', 'string', 'max:100'],
        ])->validate();

        if(empty($user)){
            if($role=='user'){
                $genders=Gender::all();
                return view('auth.registerProvider',compact('user','role','genders'));
            }else{
                return view('auth.register-company',compact('user','role'));
            }
        }else{
            if($role=='user'){
                $genders=Gender::all();
                return view('auth.register',compact('genders'));
            }else{
                return view('auth.register-company',compact('role'));
            }
        }
    }
    
    public function providerRegister(){
        $user=json_decode($_POST['user']);
        $role=$_POST['role'];

        if($role=='user'){

            Validator::make($_POST, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'gender'=>['required','integer'],
                'birthday'=>['required','date'],
                'nationality'=>['required','string','max:75'],
                'phone_contact'=>['required','regex:/[0-9]{8}/'],
                'password' => $this->passwordRules(),
            ])->validate();

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
            Validator::make($_POST, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'company_name'=>['required','string','max:150'],
                'work_area'=>['required','string','max:75'],
                'location'=>['required','string','max:100'],
                'information'=>['required','string'],
                'number_employees'=>['required','string','max:120'],
                'password' => $this->passwordRules(),
            ])->validate();
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
