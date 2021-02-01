<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblcursos_cur extends Model
{
    protected $table = 'tblcursos_cur';
    protected $primaryKey='cur_id';

    protected $fillable = [
        'cur_descripcion','cur_tipo'
    ];
}
