<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Imports\AssignsImport;
use App\Models\Assign;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AssignController extends Controller
{
    public function index()
    {
        // $jas = User::role('JEFE DE AGENCIA')->get();
        // $ass = User::role('ASESOR')->get();
        // $users = $jas->merge($ass);
        // $folders = Folder::orderBy('id', 'DESC')->get();
        // $assigns = Assign::orderBy('id', 'DESC')->get();
        
        // $jas = User::role('JEFE DE AGENCIA')->get();
        // $ass = User::role('ASESOR')->get();
        // $com = User::role('COMERCIAL')->get();
        // $users = $com->merge( $jas->merge($ass));
        // $folders = Folder::orderBy('id', 'DESC')->get();
        // $assigns = Assign::orderBy('id', 'DESC')->get();

        $com = User::role('COMERCIAL')->get();
        $jn = User::role('JEFE NACIONAL')->get();
        $jas = User::role('JEFE DE AGENCIA')->get();
        $ass = User::role('ASESOR')->get();
        $users = $com->merge( $jn->merge($jas->merge($ass)));
        $folders = Folder::orderBy('id', 'DESC')->get();
        $assigns = Assign::orderBy('id', 'DESC')->paginate(10);
        return view('admin.assigns.index', compact('assigns', 'users', 'folders'));
        // return $assigns;
    }

    public function store(Request $request)
    {
        $folder = Folder::where('id','=', $request->folder_id)->firstOrFail();

        if (!$folder->assign) {
            Assign::create($request->all());
            return back()->with('confirmation','Asignacion Registrado Correctamente');
        } else {
            return back()->with('validation','Asignacion  ya Asignada');
        }
    }

    public function update(Request $request, Assign $assign)
    {
        $assign->update($request->all());
        return back()->with('confirmation','Asignacion Actualizado Correctamente');
    }

    public function destroy(Assign $assign)
    {
        $assign->delete();
        return back()->with('mensaje', 'Asignacion Eliminado');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new AssignsImport, $file);
        return back()->with('message','importacion correcta');
    }
}
