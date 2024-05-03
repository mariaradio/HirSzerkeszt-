<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hir extends Model
{
    use HasFactory;
	protected $primaryKey="hir_id";
	protected $fillable=[
    "szerkeszto",
    'cim',
    'tartalom',
    'letrehozas',
	'utolso_szerkesztes',
	'felolvasasok_szama',
	'ervenyesseg'
    ];
}