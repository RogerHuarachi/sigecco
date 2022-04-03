<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Imports\DisbursementsImport;
use App\Models\Disbursement;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DisbursementController extends Controller
{
    public function index()
    {
        $disbursements = Disbursement::orderBy('id', 'DESC')->paginate(10);
        return view('admin.disbursements.index', compact('disbursements'));
    }

    public function store($id)
    {
        $folder = Folder::where('id','=', $id)->firstOrFail();

        if ($folder->approved) {
            if (!$folder->disbursement) {
                $user = Auth::user();

                $disbursement = new Disbursement();
                $disbursement->folder_id = $folder->id;
                $disbursement->user_id = $user->id;
                $disbursement->save();

                return back()->with('confirmation','Desembolso Registrado Correctamente');
            }else {
                return back()->with('validation','Carpeta Desembolsada');
            }
        }else {
            return back()->with('validation','Carpeta no aprobado');
        }
    }

    public function update(Request $request, Disbursement $disbursement)
    {
        //
    }

    public function destroy(Disbursement $disbursement)
    {
        $disbursement->delete();
        return back()->with('confirmation','Aprovacion Eliminado Correctamente');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DisbursementsImport, $file);
        return back()->with('message','importacion correcta');
    }
}
