<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblareas_are extends Model
{
    protected $table = 'tblareas_are';
    protected $primaryKey='are_id';

    protected $fillable = [
        'are_descripcion','are_abreviatura'
    ];
}
