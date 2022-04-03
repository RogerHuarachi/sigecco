<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\User;
use App\Models\Assign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Imports\FoldersImport;
use Maatwebsite\Excel\Facades\Excel;

class FolderController extends Controller
{
    public function index()
    {
        $users = User::get();
        $folders = Folder::orderBy('id', 'DESC')->paginate(10);
        return view('admin.folders.index', compact('folders', 'users'));
    }

    public function store(Request $request)
    {
        $folders = Folder::where('name', '=', $request->name)->exists();

        if (!$folders) {
            Folder::create($request->all());
            return back()->with('confirmation','Carpeta Registrado Correctamente');
        } else {
            return back()->with('validation','Cliente ya existente');
        }
    }

    public function update(Request $request, Folder $folder)
    {
        $folder->update($request->all());
        return back()->with('confirmation','Carpeta Actualizado Correctamente');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();
        return back()->with('mensaje', 'Carpeta Eliminada');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new FoldersImport, $file);
        return back()->with('message','importacion correcta');
    }

    public function destroyall()
    {
        $folders = Folder::all();
        foreach ($folders as $folders) {
            $folders->delete();
        }
        // return $folders;
        return back()->with('confirmation','Carpetas Eliminadas Correctamente');
    }
}
