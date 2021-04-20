<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $fillable = [
        'Phone_number',
        'Login_email',
        'Personal_email',
        'Secondary_Phone_number',
        'Web_site',
        'Linkedin'
    ];
    use HasFactory;
}
