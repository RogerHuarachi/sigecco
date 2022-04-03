<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Imports\ObservedsImport;
use App\Models\Folder;
use App\Models\Observed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ObservedController extends Controller
{
    public function index()
    {
        $observeds = Observed::orderBy('id', 'DESC')->paginate(10);
        return view('admin.observeds.index', compact('observeds'));
    }

    public function store($id)
    {
        $folder = Folder::where('id','=', $id)->firstOrFail();

        if ($folder->observed) {
            return back()->with('validation','Carpeta ya Observada');
        } elseif ($folder->approved) {
            return back()->with('validation','Carpeta ya Aprobada');
        } elseif ($folder->rejected) {
            return back()->with('validation','Carpeta ya Rechazada');
        }else {
            $user = Auth::user();
            $observed = new Observed();
            $observed->folder_id = $folder->id;
            $observed->user_id = $user->id;
            $observed->save();

            return back()->with('confirmation','Carpeta Observada Correctamente');
        }
    }

    public function update(Request $request, Observed $observed)
    {
    }

    public function destroy(Observed $observed)
    {
        $observed->delete();
        return back()->with('confirmation','Observación Eliminado Correctamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ObservedsImport, $file);
        return back()->with('message','importacion correcta');
    }
}
