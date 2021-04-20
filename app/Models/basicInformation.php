<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basicInformation extends Model
{
    protected $fillable = [
        'Preferred_name',
        'First_name',
        'Last_name',
        'Nationality',
        'Gender',
        'Blood_group'
    ];
    use HasFactory;
}
