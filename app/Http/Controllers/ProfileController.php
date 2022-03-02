<?php

namespace App\Http\Controllers;

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
}
