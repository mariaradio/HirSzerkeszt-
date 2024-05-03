<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hir_archiv extends Model
{
    use HasFactory;
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('hir', '=', $this->getAttribute('hir'))
            ->where('csere', '=', $this->getAttribute('csere'));
        return $query;
    }

    protected $fillable=[
    'hir',
    'csere',
    'ervenyesseg',
    'cim',
    'tartalom'
    ];
}
