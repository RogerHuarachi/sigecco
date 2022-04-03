<?php

namespace App\Http\Controllers\Admin\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Banco;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    public function index()
    {
        $bancos = Banco::orderBy('id', 'DESC')->paginate(10);
        return view('admin.bancos.index', compact('bancos'));
    }

    public function store(Request $request)
    {
        $banco = new Banco();
        $banco->date = $request->date;
        $banco->item = $request->item;
        $banco->money = $request->money;
        $banco->save();
        return back()->with('confirmation','Monto Registrados Correctamente');;
    }

    public function update(Request $request, Banco $banco)
    {
        $banco->update($request->all());
        return back()->with('confirmation','Monto Actualizado Correctamente');
    }

    public function destroy(Banco $banco)
    {
        $banco->delete();
        return back()->with('confirmation','Monto Eliminado Correctamente');
    }
}
