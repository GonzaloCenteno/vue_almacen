<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblunidades_uni extends Model
{
    protected $table = 'tblunidades_uni';
    protected $primaryKey='uni_id';

    protected $fillable = [
        'uni_descripcion','uni_abreviatura'
    ];
}
