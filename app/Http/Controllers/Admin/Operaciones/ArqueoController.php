<?php

namespace App\Http\Controllers\Admin\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Arqueo;
use App\Models\Entrada;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArqueoController extends Controller
{
    public function index()
    {
        $arqueos = Arqueo::orderBy('id', 'DESC')->paginate(10);
        $agencies = Agency::get();
        return view('admin.arqueos.index', compact('arqueos', 'agencies'));
        // return view('admin.arqueos.index');
        // return $agencies;
    }

    public function store(Request $request)
    {
        $arqueosList = collect();
        $ids = $request->agencies;
        foreach ($ids as $id) {
            $agency = Agency::find($id);
            $user = Auth::user();
            $date = Carbon::now()->format('Y-m-d');

            $money = 0;
            $arqueoOld = Arqueo::where('agency_id','=', $agency->id)->exists();
            if ($arqueoOld) {
                $arqueoOld = Arqueo::where('agency_id','=', $id)->latest()->first();;
                $money = $arqueoOld->entradas->sum('money') - $arqueoOld->salidas->sum('money');
            }

            $arqueo = new Arqueo;
            $arqueo->agency_id = $agency->id;
            $arqueo->user_id = $user->id;
            $arqueo->date = $date;
            $arqueo->tc = $request->tc;
            $arqueo->save();

            $entrada = new Entrada();
            $entrada->arqueo_id = $arqueo->id;
            $entrada->category = 'Transferencia de bóveda';
            $entrada->item = 'saldo inicial';
            $entrada->money = $money;
            $entrada->save();

            $arqueosList->push($arqueo);
        }
        return back()->with('confirmation','Arqueos Registrados Correctamente');
    }

    public function update(Request $request, Arqueo $arqueo)
    {
        //
    }

    public function destroy(Arqueo $arqueo)
    {
        $arqueo->delete();
        return back()->with('mensaje', 'Arqueo Eliminado');
    }
}
