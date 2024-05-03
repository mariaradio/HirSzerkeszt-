<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korlatok extends Model
{
    use HasFactory;
    protected $fillable=[
        'beallitas_kezdete',
        'cim_hossz',
        'tartalom_hossz'
    ];
}
