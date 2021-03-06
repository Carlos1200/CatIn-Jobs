<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hiring_Publication extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'hiring_type', 'description', 'salary'];
    protected $table = 'hiring_publication';
}
