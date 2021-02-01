<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblepps_epp extends Model
{
    protected $table = 'tblepps_epp';
    protected $primaryKey='epp_id';

    protected $fillable = [
        'epp_descripcion'
    ];
}
