<?php

namespace App\Http\Controllers\Admin\Operaciones;

use App\Http\Controllers\Controller;
use App\Imports\SalidasImport;
use App\Models\Arqueo;
use App\Models\Salida;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::orderBy('id', 'DESC')->paginate(10);
        $arqueos = Arqueo::get();
        return view('admin.salidas.index', compact('salidas', 'arqueos'));
    }

    public function store(Request $request)
    {
        salida::create($request->all());
        return back()->with('confirmation','Salida Registrado Correctamente');
    }

    public function update(Request $request, Salida $salida)
    {
        $salida->update($request->all());
        return back()->with('confirmation','Salida Actualizado Correctamente');
    }

    public function destroy(Salida $salida)
    {
        $salida->delete();
        return back()->with('confirmation','Salida Eliminado Correctamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new SalidasImport, $file);
        return back()->with('message','importacion correcta');
    }

    public function destroyImport()
    {
        $date = Carbon::now()->format('Y-m-d');
        $arqueos = Arqueo::where('date', $date)->get();
        foreach ($arqueos as $arqueo) {
            $salidas = $arqueo->salidas;
            foreach ($salidas as $salida) {
                $salida->delete();
            }
        }
        return back()->with('confirmation','Salidas Registradas Hoy fueron Eliminadas Correctamente');
    }
}
