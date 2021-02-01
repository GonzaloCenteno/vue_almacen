<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tblsucursales_suc extends Model
{
	use SoftDeletes;

    protected $table = 'tblsucursales_suc';
    protected $primaryKey='suc_id';

    protected $fillable = [
        'suc_descripcion','suc_direccion','suc_abreviatura'
    ];
}
