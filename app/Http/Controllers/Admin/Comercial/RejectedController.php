<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Imports\RejectedsImport;
use App\Models\Folder;
use App\Models\Rejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RejectedController extends Controller
{
    public function index()
    {
        $rejecteds = Rejected::orderBy('id', 'DESC')->paginate(10);
        return view('admin.rejecteds.index', compact('rejecteds'));
    }

    public function store($id)
    {
        $folder = Folder::where('id','=', $id)->firstOrFail();

        if ($folder->approved) {
            return back()->with('validation','Carpeta ya Aprobada');
        } elseif ($folder->rejected) {
            return back()->with('validation','Carpeta ya Rechazada');
        } else {
            $user = Auth::user();

            $rejected = new Rejected();
            $rejected->folder_id = $folder->id;
            $rejected->user_id = $user->id;
            $rejected->save();

            return back()->with('confirmation','Carpeta Rechazada Correctamente');
        }
    }

    public function update(Request $request, Rejected $rejected)
    {
        //
    }

    public function destroy(Rejected $rejected)
    {
        $rejected->delete();
        return back()->with('confirmation','Aprovacion Eliminado Correctamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new RejectedsImport, $file);
        return back()->with('message','importacion correcta');
    }
}
