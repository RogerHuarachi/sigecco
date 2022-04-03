<?php

namespace App\Http\Controllers\User\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Salida;
use App\Models\Arqueo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::where('created_at', '>=', new Carbon('today'))->paginate(10);
        $arqueos = Arqueo::get();
        return view('admin.salidas.index', compact('salidas', 'arqueos'));
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Salida $salida)
    {
        //
    }

    public function edit(Salida $salida)
    {
        //
    }

    public function update(Request $request, Salida $salida)
    {
        //
    }

    public function destroy(Salida $salida)
    {
        //
    }
}
