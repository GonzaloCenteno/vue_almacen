<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblcursos_cur;
use App\Http\Requests\CursosRequest;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller
{

    public function index()
    {
        return Tblcursos_cur::orderBy('cur_id','desc')->get()->toArray();
    }

    public function Crear(CursosRequest $request)
    {
    	if(!$request->ajax()) return redirect('/');
        $curso = Tblcursos_cur::create($request->all());
        return $curso->cur_id;
    }

    public function getCurso(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        return Tblcursos_cur::where('cur_id', $request['id'])->get()->toArray();
    }

    public function Modificar(CursosRequest $request, $cur_id)
    {
        if(!$request->ajax()) return redirect('/');
        $curso = Tblcursos_cur::find($cur_id);
        $curso->update($request->all());
        return $curso->cur_id;
    }

}
