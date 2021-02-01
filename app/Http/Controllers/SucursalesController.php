<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblsucursales_suc;
use App\Http\Requests\SucursalesRequest;
use Illuminate\Support\Facades\DB;

class SucursalesController extends Controller
{

    public function index()
    {
        return Tblsucursales_suc::orderBy('suc_id','desc')->get()->toArray();
    }

    public function Crear(SucursalesRequest $request)
    {
    	if(!$request->ajax()) return redirect('/');
        $sucursal = Tblsucursales_suc::create($request->all());
        return $sucursal->suc_id;
    }

    public function getSucursal(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        return Tblsucursales_suc::where('suc_id', $request['id'])->get()->toArray();
    }

    public function Modificar(SucursalesRequest $request, $suc_id)
    {
        if(!$request->ajax()) return redirect('/');
        $sucursal = Tblsucursales_suc::find($suc_id);
        $sucursal->update($request->all());
        return $sucursal->suc_id;
    }

}
