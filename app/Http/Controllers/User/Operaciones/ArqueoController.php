<?php

namespace App\Http\Controllers\User\Operaciones;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Arqueo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArqueoController extends Controller
{
    public function indexUser()
    {
        // $arqueos = Arqueo::get();
        // $agencies = Agency::get();
        
        $date = Carbon::now()->format('Y-m-d');

        $agency = Auth::user()->agency;
        $agencies = Agency::get();
        $arqueos = Arqueo::where('date',$date)->get();
        return view('user.arqueos.index', compact('arqueos', 'agencies'));
    }

    public function showUser(Arqueo $arqueo)
    {
        return view('user.arqueos.show', compact('arqueo'));
    }

    public function print(Arqueo $arqueo)
    {
        return view('user.arqueos.print', compact('arqueo'));
    }

    public function indexja()
    {
        $date = Carbon::now()->format('Y-m-d');

        $agency = Auth::user()->agency;
        $agencies = Agency::get();
        $arqueos = Arqueo::where('agency_id',$agency->id)->where('date',$date)->get();
        return view('user.arqueos.ja.index', compact('arqueos'));
    }

    public function showja(Arqueo $arqueo)
    {
        return view('user.arqueos.ja.show', compact('arqueo'));
    }
}
