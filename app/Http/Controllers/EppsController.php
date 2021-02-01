<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblepps_epp;
use App\Http\Requests\EppsRequest;
use Illuminate\Support\Facades\DB;

class EppsController extends Controller
{

    public function index()
    {
        return Tblepps_epp::orderBy('epp_id','desc')->get()->toArray();
    }

    public function Crear(EppsRequest $request)
    {
    	if(!$request->ajax()) return redirect('/');
        $epp = Tblepps_epp::create($request->all());
        return $epp->epp_id;
    }

    public function getEpp(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        return Tblepps_epp::where('epp_id', $request['id'])->get()->toArray();
    }

    public function Modificar(EppsRequest $request, $epp_id)
    {
        if(!$request->ajax()) return redirect('/');
        $epp = Tblepps_epp::find($epp_id);
        $epp->update($request->all());
        return $epp->epp_id;
    }

}
