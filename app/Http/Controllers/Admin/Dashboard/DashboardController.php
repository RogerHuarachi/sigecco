<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Approved;
use App\Models\Dashboard;
use App\Models\Disbursement;
use App\Models\Folder;
use App\Models\Observed;
use App\Models\Rejected;
use App\Models\Arqueo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function store(Request $request)
    {
        $foldersList = Folder::whereBetween('created_at', [$request->inicio, $request->fin])->get();
        $observedsList = Observed::whereBetween('created_at', [$request->inicio, $request->fin])->get();
        $approvedsList = Approved::whereBetween('created_at', [$request->inicio, $request->fin])->get();
        $rejectedsList = Rejected::whereBetween('created_at', [$request->inicio, $request->fin])->get();
        $disbursementsList = Disbursement::whereBetween('created_at', [$request->inicio, $request->fin])->get();

        $foldersCount = $foldersList->count();
        $observedsCount = $observedsList->count();
        $approvedsCount = $approvedsList->count();
        $rejectedsCount = $rejectedsList->count();
        $disbursementsCount = $disbursementsList->count();
        $srCount = 0;
        if ($observedsCount >= $approvedsCount) {
            $srCount = $foldersCount - $observedsCount;
        } else {
            $srCount = $foldersCount - $approvedsCount;
        }



        $cantFolAge = Dashboard::cantFolAge($request->inicio, $request->fin);
        $cantFolAse = Dashboard::cantFolAse($request->inicio, $request->fin);

        $cantAsigAse = Dashboard::cantAsigAse($request->inicio, $request->fin);

        // return $cantAsigAse;
        return view('dashboard.dashboard', compact('foldersCount', 'srCount', 'observedsCount', 'approvedsCount', 'rejectedsCount', 'disbursementsCount',
                 'cantFolAge', 'cantFolAse', 'cantAsigAse'
                ));;
    }

    public function forders()
    {
        $folders = Folder::orderBy('id', 'DESC')->get();
        return view('dashboard.folders', compact('folders'));
    }

    public function arqueos()
    {
        $arqueos = Arqueo::orderBy('id', 'DESC')->get();
        return view('dashboard.arqueos', compact('arqueos'));
        // return $arqueos;
    }
    public function arqueosprint()
    {
        $arqueos = Arqueo::orderBy('id')->get();
        return view('dashboard.arqueosprint', compact('arqueos'));
        // return $arqueos;
    }





    public function cantFolAse()
    {
        $cantFolAse = Dashboard::cantFolAse();
        // $array = array();
        // foreach($cantFolAse as $date){
        //     $array += [$date->name => $date->total_timeReg];
        // }
        return $cantFolAse;
    }
}
