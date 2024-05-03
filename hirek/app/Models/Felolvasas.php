<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felolvasas extends Model
{
    use HasFactory;

        public $timestamps = FALSE;
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('hir', '=', $this->getAttribute('hir'))
            ->where('felolvasas_datuma', '=', $this->getAttribute('felolvasas_datuma'));
        return $query;
    }

    protected $fillable=[
        'felolvaso',
        'hir',
        'felolvasas_datuma'];
}
