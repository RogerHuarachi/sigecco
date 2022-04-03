<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Arqueo;
use App\Models\Banco;
use Illuminate\Http\Request;

class ConsolidadoController extends Controller
{
    public function index()
    {
        return view('user.consolidado.index');
    }

    public function store(Request $request)
    {
        $arqueos = Arqueo::where('date', $request->date)->get();
        $docientosbs = 0;
        $cienbs = 0;
        $cincuentabs = 0;
        $veintebs = 0;
        $diezbs = 0;
        $cincobs = 0;
        $dosbs = 0;
        $unobs = 0;
        $cincuentacentbs = 0;
        $veintecentbs = 0;
        $diezcentbs = 0;
        $totalbs = 0;
        foreach ($arqueos as $arqueo) {
            if ($arqueo->boliviano) {
                $docientosbs = $docientosbs + ($arqueo->boliviano->docientos*200);
                $cienbs = $cienbs + ($arqueo->boliviano->cien*100);
                $cincuentabs = $cincuentabs + ($arqueo->boliviano->cincuenta*50);
                $veintebs = $veintebs + ($arqueo->boliviano->veinte*20);
                $diezbs = $diezbs + ($arqueo->boliviano->diez*10);
                $cincobs = $cincobs + ($arqueo->boliviano->cinco*5);
                $dosbs = $dosbs + ($arqueo->boliviano->dos*2);
                $unobs = $unobs + ($arqueo->boliviano->uno*1);
                $cincuentacentbs = $cincuentacentbs + ($arqueo->boliviano->cincuentacent*0.5);
                $veintecentbs = $veintecentbs + ($arqueo->boliviano->veintecent*0.2);
                $diezcentbs = $diezcentbs + ($arqueo->boliviano->diezcent*0.1);
                $totalbs = $totalbs + ($arqueo->boliviano->totalbs);
            }
        }

        $ciend = 0;
        $cincuentad = 0;
        $veinted = 0;
        $diezd = 0;
        $cincod = 0;
        $dosd = 0;
        $unod = 0;
        $totald = 0;
        foreach ($arqueos as $arqueo) {
            if ($arqueo->dolar) {
                $ciend = $ciend + ($arqueo->dolar->ciend*100);
                $cincuentad = $cincuentad + ($arqueo->dolar->cincuentad*50);
                $veinted = $veinted + ($arqueo->dolar->viented*20);
                $diezd = $diezd + ($arqueo->dolar->diezd*10);
                $cincod = $cincod + ($arqueo->dolar->cincod*5);
                $dosd = $dosd + ($arqueo->dolar->dosd*2);
                $unod = $unod + ($arqueo->dolar->unod*1);
                $totald = $totald + ($arqueo->dolar->totald);
            }
        }

        $bancos = Banco::where('date', $request->date)->get();



        $date = $request->date;
        $tc = $arqueos->avg('tc');
        return view('user.consolidado.show', compact('arqueos',
         'totalbs', 'docientosbs', 'cienbs', 'cincuentabs', 'veintebs', 'diezbs', 'cincobs', 'dosbs', 'unobs', 'cincuentacentbs', 'veintecentbs', 'diezcentbs',
         'totald', 'ciend', 'cincuentad', 'veinted', 'diezd', 'cincod', 'dosd', 'unod',
         'bancos', 'date', 'tc'
        ));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function print(Request $request)
    {

        $arqueos = Arqueo::where('date', $request->date)->get();
        $docientosbs = 0;
        $cienbs = 0;
        $cincuentabs = 0;
        $veintebs = 0;
        $diezbs = 0;
        $cincobs = 0;
        $dosbs = 0;
        $unobs = 0;
        $cincuentacentbs = 0;
        $veintecentbs = 0;
        $diezcentbs = 0;
        $totalbs = 0;
        foreach ($arqueos as $arqueo) {
            if ($arqueo->boliviano) {
                $docientosbs = $docientosbs + ($arqueo->boliviano->docientos*200);
                $cienbs = $cienbs + ($arqueo->boliviano->cien*100);
                $cincuentabs = $cincuentabs + ($arqueo->boliviano->cincuenta*50);
                $veintebs = $veintebs + ($arqueo->boliviano->veinte*20);
                $diezbs = $diezbs + ($arqueo->boliviano->diez*10);
                $cincobs = $cincobs + ($arqueo->boliviano->cinco*5);
                $dosbs = $dosbs + ($arqueo->boliviano->dos*2);
                $unobs = $unobs + ($arqueo->boliviano->uno*1);
                $cincuentacentbs = $cincuentacentbs + ($arqueo->boliviano->cincuentacent*0.5);
                $veintecentbs = $veintecentbs + ($arqueo->boliviano->veintecent*0.2);
                $diezcentbs = $diezcentbs + ($arqueo->boliviano->diezcent*0.1);
                $totalbs = $totalbs + ($arqueo->boliviano->totalbs);
            }
        }

        $ciend = 0;
        $cincuentad = 0;
        $veinted = 0;
        $diezd = 0;
        $cincod = 0;
        $dosd = 0;
        $unod = 0;
        $totald = 0;
        foreach ($arqueos as $arqueo) {
            if ($arqueo->dolar) {
                $ciend = $ciend + ($arqueo->dolar->ciend*100);
                $cincuentad = $cincuentad + ($arqueo->dolar->cincuentad*50);
                $veinted = $veinted + ($arqueo->dolar->viented*20);
                $diezd = $diezd + ($arqueo->dolar->diezd*10);
                $cincod = $cincod + ($arqueo->dolar->cincod*5);
                $dosd = $dosd + ($arqueo->dolar->dosd*2);
                $unod = $unod + ($arqueo->dolar->unod*1);
                $totald = $totald + ($arqueo->dolar->totald);
            }
        }

        $bancos = Banco::where('date', $request->date)->get();
        return view('user.consolidado.print', compact('arqueos',
         'totalbs', 'docientosbs', 'cienbs', 'cincuentabs', 'veintebs', 'diezbs', 'cincobs', 'dosbs', 'unobs', 'cincuentacentbs', 'veintecentbs', 'diezcentbs',
         'totald', 'ciend', 'cincuentad', 'veinted', 'diezd', 'cincod', 'dosd', 'unod',
         'bancos'
        ));
    }
}
