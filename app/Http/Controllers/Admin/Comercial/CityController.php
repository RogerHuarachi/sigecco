<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name')->get();
        return view('admin.cities.index', compact('cities'));
    }

    public function store(Request $request)
    {
        City::create($request->all());
        return back()->with('confirmation','Departamento Registrado Correctamente');
    }

    public function update(Request $request, City $city)
    {
        $city->update($request->all());
        return back()->with('confirmation','Departamento Actualizado Correctamente');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return back()->with('mensaje', 'Departamento Eliminado');
    }
}
