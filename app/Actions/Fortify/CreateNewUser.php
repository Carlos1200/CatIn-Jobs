<?php

namespace App\Actions\Fortify;

use App\Models\Personal_Information;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender'=>['required','integer'],
            'birthday'=>['required','date'],
            'nationality'=>['required','string','max:75'],
            'phone_contact'=>['required','regex:/[0-9]{8}/'],
            'password' => $this->passwordRules(),
        ])->validate();

        $info= Personal_Information::create([
            'genders_id'=>$input['gender'],
            'birthday'=>$input['birthday'],
            'nationality'=>$input['nationality'],
            'phone_contact'=>$input['phone_contact'],
        ]);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'id_information'=>$info->id,
        ]);

    }
}
