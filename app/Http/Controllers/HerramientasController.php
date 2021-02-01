<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblherramientas_her;
use App\Http\Requests\HerramientasRequest;
use Illuminate\Support\Facades\DB;

class HerramientasController extends Controller
{

    public function index()
    {
        $sql = Tblherramientas_her::orderBy('her_id','desc')->get();
        $arreglo = array();
        foreach ($sql as $Index => $Datos) {
            $arreglo[$Index]['her_id'] = $Datos->her_id;
            $arreglo[$Index]['her_nombre'] = $Datos->her_nombre;
            $arreglo[$Index]['her_descripcion'] = $Datos->her_descripcion;
            $arreglo[$Index]['uni_id'] = $Datos->unidades->uni_descripcion;
        }
        return $arreglo;
    }

    public function Crear(HerramientasRequest $request)
    {
    	if(!$request->ajax()) return redirect('/');
        $herramienta = Tblherramientas_her::create($request->all());
        return $herramienta->her_id;
    }

    public function getHerramienta(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        return Tblherramientas_her::where('her_id', $request['id'])->get()->toArray();
    }

    public function Modificar(HerramientasRequest $request, $her_id)
    {
        if(!$request->ajax()) return redirect('/');
        $herramienta = Tblherramientas_her::find($her_id);
        $herramienta->update($request->all());
        return $herramienta->her_id;
    }

}
