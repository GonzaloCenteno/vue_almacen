<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblunidades_uni;
use App\Http\Requests\UnidadesRequest;
use Illuminate\Support\Facades\DB;

class UnidadesController extends Controller
{

    public function index()
    {
        return Tblunidades_uni::orderBy('uni_id','desc')->get()->toArray();
    }

    public function Crear(UnidadesRequest $request)
    {
    	if(!$request->ajax()) return redirect('/');
        $unidad = Tblunidades_uni::create($request->all());
        return $unidad->uni_id;
    }

    public function getUnidad(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        return Tblunidades_uni::where('uni_id', $request['id'])->get()->toArray();
    }

    public function Modificar(UnidadesRequest $request, $uni_id)
    {
        if(!$request->ajax()) return redirect('/');
        $unidad = Tblunidades_uni::find($uni_id);
        $unidad->update($request->all());
        return $unidad->uni_id;
    }

}
