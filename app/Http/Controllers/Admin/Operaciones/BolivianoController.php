<?php

namespace App\Http\Controllers\Admin\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Arqueo;
use App\Models\Boliviano;
use Illuminate\Http\Request;

class BolivianoController extends Controller
{
    public function index()
    {
        $bolivianos = Boliviano::orderBy('id', 'DESC')->paginate(10);
        $arqueos = Arqueo::get();
        return view('admin.bolivianos.index', compact('bolivianos', 'arqueos'));
    }

    public function store(Request $request)
    {
        $arqueo = Arqueo::find($request->arqueo_id);
        if ($arqueo->boliviano) {
            return back()->with('validation','Detalle ya Registrado');
        } else {
            $boliviano = new Boliviano();
            $boliviano->arqueo_id = $request->arqueo_id;
            $boliviano->docientos = $request->docientos;
            $boliviano->cien = $request->cien;
            $boliviano->cincuenta = $request->cincuenta;
            $boliviano->veinte = $request->veinte;
            $boliviano->diez = $request->diez;
            $boliviano->cinco = $request->cinco;
            $boliviano->dos = $request->dos;
            $boliviano->uno = $request->uno;
            $boliviano->cincuentacent = $request->cincuentacent;
            $boliviano->veintecent = $request->veintecent;
            $boliviano->diezcent = $request->diezcent;
            $boliviano->totalbs = ($request->docientos * 200) + ($request->cien * 100) + ($request->cincuenta * 50) + ($request->veinte * 20) + ($request->diez * 10)
                                 + ($request->cinco * 5) + ($request->dos * 2) + ($request->uno * 1) + ($request->cincuentacent * 0.50) + ($request->veintecent * 0.20)
                                  + ($request->diezcent * 0.10);
            $boliviano->save();
            return back()->with('confirmation','Detalle Registrado Correctamente');
        }
    }

    public function update(Request $request, Boliviano $boliviano)
    {
    }

    public function destroy(Boliviano $boliviano)
    {
        $boliviano->delete();
        return back()->with('confirmation','Detalle en Bs Eliminado Correctamente');
    }
}
