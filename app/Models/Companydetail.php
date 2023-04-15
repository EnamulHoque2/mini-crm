<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companydetail extends Model
{
    use HasFactory;

    protected $table = 'companydetails';
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];
}
