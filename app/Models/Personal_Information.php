<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_Information extends Model
{
    protected $table = 'personal_information';
    protected $fillable = ['genders_id','birthday','nationality','phone_contact'];
    use HasFactory;
}
