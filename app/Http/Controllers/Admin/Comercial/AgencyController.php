<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\City;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        $agencies = Agency::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        return view('admin.agencies.index', compact('agencies', 'cities'));
    }

    public function store(Request $request)
    {
        Agency::create($request->all());
        return back()->with('confirmation','Agencia Registrado Correctamente');
    }

    public function update(Request $request, Agency $agency)
    {
        $agency->update($request->all());
        return back()->with('confirmation','Agencia Actualizado Correctamente');
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();
        return back()->with('mensaje', 'Agencia Eliminado');
    }
}
