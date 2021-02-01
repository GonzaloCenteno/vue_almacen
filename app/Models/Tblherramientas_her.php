<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tblunidades_uni;

class Tblherramientas_her extends Model
{
    protected $table = 'tblherramientas_her';
    protected $primaryKey='her_id';

    protected $fillable = [
        'her_nombre','her_descripcion','uni_id'
    ];

    public function unidades()
    {
        return $this->hasOne(Tblunidades_uni::class,'uni_id','uni_id');
    }
}
