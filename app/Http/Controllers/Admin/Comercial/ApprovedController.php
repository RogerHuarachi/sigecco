<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Imports\ApprovedsImport;
use App\Models\Approved;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ApprovedController extends Controller
{
    public function index()
    {
        $approveds = Approved::orderBy('id', 'DESC')->paginate(10);
        return view('admin.approveds.index', compact('approveds'));
    }

    public function store($id)
    {
        $folder = Folder::where('id','=', $id)->firstOrFail();

        if ($folder->observed) {
            $user = Auth::user();

            $approved = new Approved();
            $approved->folder_id = $folder->id;
            $approved->user_id = $user->id;
            $approved->save();

            return back()->with('confirmation','Carpeta Aprobada Correctamente');
        } elseif ($folder->approved) {
            return back()->with('validation','Carpeta ya Aprobada');
        } elseif ($folder->rejected) {
            return back()->with('validation','Carpeta ya Rechazada');
        } else {
            $user = Auth::user();

            $approved = new Approved();
            $approved->folder_id = $folder->id;
            $approved->user_id = $user->id;
            $approved->save();

            return back()->with('confirmation','Carpeta Aprobada Correctamente');
        }
    }

    public function update(Request $request, Approved $approved)
    {
        //
    }

    public function destroy(Approved $approved)
    {
        $approved->delete();
        return back()->with('confirmation','Aprovacion Eliminado Correctamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ApprovedsImport, $file);
        return back()->with('message','importacion correcta');
    }
}
