<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Information extends Model
{
    protected $table = 'company_information';
    protected $fillable = ['company_name','work_area','location','information','number_employees','user_id'];
    use HasFactory;
}
