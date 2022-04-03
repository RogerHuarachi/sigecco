<?php

namespace App\Http\Controllers\User\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Arqueo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntradaController extends Controller
{
    public function index()
    {
        // $date = Carbon::now()->format('Y/m/d');

        $entradas = Entrada::where('created_at', '>=', new Carbon('today'))->paginate(10);
        $arqueos = Arqueo::get();
        return view('admin.entradas.index', compact('entradas', 'arqueos'));
        // return $entradas;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Entrada $entrada)
    {
        //
    }

    public function edit(Entrada $entrada)
    {
        //
    }

    public function update(Request $request, Entrada $entrada)
    {
        //
    }

    public function destroy(Entrada $entrada)
    {
        //
    }
}
