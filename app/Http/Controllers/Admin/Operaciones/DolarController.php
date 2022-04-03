<?php

namespace App\Http\Controllers\Admin\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Arqueo;
use App\Models\Dolar;
use App\Models\Entrada;
use App\Models\Salida;
use Illuminate\Http\Request;

class DolarController extends Controller
{
    public function index()
    {
        $dolars = dolar::orderBy('id', 'DESC')->paginate(10);
        $arqueos = Arqueo::get();
        return view('admin.dolars.index', compact('dolars', 'arqueos'));
    }

    public function store(Request $request)
    {
        $arqueo = Arqueo::find($request->arqueo_id);
        if ($arqueo->dolar) {
            return back()->with('validation','Detalle ya Registrado');
        } else {
            $dolar = new Dolar();
            $dolar->arqueo_id = $request->arqueo_id;
            $dolar->ciend = $request->ciend;
            $dolar->cincuentad = $request->cincuentad;
            $dolar->viented = $request->viented;
            $dolar->diezd = $request->diezd;
            $dolar->cincod = $request->cincod;
            $dolar->dosd = $request->dosd;
            $dolar->unod = $request->unod;
            $dolar->totald = ($request->ciend * 100) + ($request->cincuentad * 50) + ($request->viented * 20) + ($request->diezd * 10) + ($request->cincod * 5)
                                 + ($request->dosd * 2) + ($request->unod * 1);
            $dolar->save();

            $totalSis = $arqueo->entradas->sum('money') - $arqueo->salidas->sum('money');
            $totalCaj = $arqueo->boliviano->totalbs + ($dolar->totald * $arqueo->tc);
            $total = $totalCaj - $totalSis;
            if ($total >= 0) {
                $entrada = new Entrada();
                $entrada->arqueo_id = $arqueo->id;
                $entrada->category = 'sobrante';
                $entrada->item = 'sobrante';
                $entrada->money = round($total, 2);
                $entrada->save();
            } else {
                $salida = new Salida();
                $salida->arqueo_id = $arqueo->id;
                $salida->category = 'faltante';
                $salida->item = 'faltante';
                $salida->money = round($total*-1, 2);
                $salida->save();
            }
            return back()->with('confirmation','Detalle Registrado Correctamente');
        }
    }

    public function update(Request $request, Dolar $dolar)
    {
        //
    }

    public function destroy(Dolar $dolar)
    {
        $dolar->delete();
        return back()->with('confirmation','Detalle en Bs Eliminado Correctamente');
    }
}
