<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblareas_are;
use App\Http\Requests\AreasRequest;
use Illuminate\Support\Facades\DB;

class AreasController extends Controller
{

    public function index()
    {
        return Tblareas_are::orderBy('are_id','desc')->get()->toArray();
    }

    public function Crear(AreasRequest $request)
    {
    	if(!$request->ajax()) return redirect('/');
        $area = Tblareas_are::create($request->all());
        return $area->are_id;
    }

    public function getArea(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        return Tblareas_are::where('are_id', $request['id'])->get()->toArray();
    }

    public function Modificar(AreasRequest $request, $are_id)
    {
        if(!$request->ajax()) return redirect('/');
        $area = Tblareas_are::find($are_id);
        $area->update($request->all());
        return $area->are_id;
    }

}
