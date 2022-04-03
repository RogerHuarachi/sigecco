<?php

namespace App\Http\Controllers\Admin\Operaciones;

use App\Http\Controllers\Controller;
use App\Imports\EntradasImport;
use App\Models\Arqueo;
use App\Models\Entrada;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::orderBy('id', 'DESC')->paginate(10);
        $arqueos = Arqueo::get();
        return view('admin.entradas.index', compact('entradas', 'arqueos'));
    }

    public function store(Request $request)
    {
        Entrada::create($request->all());
        return back()->with('confirmation','Entrada Registrado Correctamente');
    }

    public function update(Request $request, Entrada $entrada)
    {
        $entrada->update($request->all());
        return back()->with('confirmation','Entrada Actualizado Correctamente');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();
        return back()->with('confirmation','Entrada Eliminado Correctamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new EntradasImport, $file);
        return back()->with('message','importacion correcta');
    }

    public function destroyImport()
    {
        $date = Carbon::now()->format('Y-m-d');
        $arqueos = Arqueo::where('date', $date)->get();
        foreach ($arqueos as $arqueo) {
            $entradas = $arqueo->entradas;
            foreach ($entradas as $entrada) {
                if ($entrada->item != "saldo inicial") {
                    $entrada->delete();
                }
            }
        }
        return back()->with('confirmation','Entradas Registradas Hoy fueron Eliminadas Correctamente');
    }
}
