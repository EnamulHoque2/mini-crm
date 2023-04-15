<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeedetail extends Model
{
    use HasFactory;

    protected $table = 'employeedetails';
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone'
    ];
}
