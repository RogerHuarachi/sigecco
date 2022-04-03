<?php

namespace App\Http\Controllers\User\Comercial;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use App\Models\Folder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    
    public function storeuser(Request $request)
    {
        $folders = Folder::where('name', '=', $request->name)->exists();

        if (!$folders) {
            $user = Auth::user();
            $report = Carbon::create($request->report);

            $folder = new Folder();
            $folder->name = $request->name;
            $folder->money = $request->money;
            $folder->term = $request->term;
            $folder->report = $request->report;
            $folder->gender = $request->gender;
            $folder->user_id = $user->id;

            $folder->save();
            if ($folder->money <= $user->agency->autonomy) {
                if ($user->hasRole('ASESOR')) {
                    $users = User::role('JEFE DE AGENCIA')->get();
                    foreach ($users as $user) {
                        if( $user->agency->id == $folder->user->agency->id){
                            $assign = new Assign();
                            $assign->folder_id = $folder->id;
                            $assign->user_id = $user->id;
                            $assign->save();
                            break;
                        }
                    }
                    return back()->with('confirmation','Carpeta Registrado Correctamente');
                } elseif ($user->hasRole('JEFE DE AGENCIA')) {
                    $users = User::role('JEFE DE AGENCIA')->where('id', '!=', $user->id)->get();

                    $assign = new Assign();
                    $assign->folder_id = $folder->id;
                    $assign->user_id = $users->random()->id;
                    $assign->save();
                    
                    return back()->with('confirmation','Carpeta Registrado Correctamente');
                } else {
                    $user = User::role('JEFE NACIONAL')->first();

                    $assign = new Assign();
                    $assign->folder_id = $folder->id;
                    $assign->user_id = $user->id;
                    $assign->save();
                    return back()->with('confirmation','Carpeta Registrado Correctamente');
                }
            } elseif ($folder->money > $user->agency->autonomy && $folder->money <= 9000) {
                $user = User::role('JEFE NACIONAL')->first();

                $assign = new Assign();
                $assign->folder_id = $folder->id;
                $assign->user_id = $user->id;
                $assign->save();

                return back()->with('confirmation','Carpeta Registrado Correctamente');
            } elseif ($folder->money > 9000) {
                $user = User::role('COMERCIAL')->first();

                $assign = new Assign();
                $assign->folder_id = $folder->id;
                $assign->user_id = $user->id;
                $assign->save();

                return back()->with('confirmation','Carpeta Registrado Correctamente');
            } else {
                if ($folder->money <= 9000) {
                    $user = User::role('JEFE NACIONAL')->first();

                    $assign = new Assign();
                    $assign->folder_id = $folder->id;
                    $assign->user_id = $user->id;
                    $assign->save();

                    return back()->with('confirmation','Carpeta Registrado Correctamente');
                } else {
                    $user = User::role('COMERCIAL')->first();

                    $assign = new Assign();
                    $assign->folder_id = $folder->id;
                    $assign->user_id = $user->id;
                    $assign->save();

                    return back()->with('confirmation','Carpeta Registrado Correctamente');
                }
            }
        } else {
            return back()->with('validation','Cliente ya existente');
        }
    }

    public function assign()
    {
        $user = Auth::user();
        $assigns = Assign::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.assigns.index', compact('assigns'));
    }
    public function regist()
    {
        $user = Auth::user();
        $folders = Folder::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.registrados.index', compact('folders'));
    }
    public function comercial()
    {
        $user = User::role('COMERCIAL')->first();
        $assigns = Assign::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.reviews.index', compact('assigns'));
    }
    public function nacional()
    {
        $user = User::role('JEFE NACIONAL')->first();
        $assigns = Assign::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.reviews.index', compact('assigns'));
    }
    public function encargado()
    {
        $agency = Auth::user()->agency;
        $users = User::role('JEFE DE AGENCIA')->get();
        $ja = null;
        foreach ($users as $user) {
            if ($user->agency_id == $agency->id) {
                $ja = $user;
                break;
            }
        }
        $assigns = Assign::where('user_id', $ja->id)->get();
        return view('user.folders.reviews.index', compact('assigns'));
    }
    public function disbursement()
    {
        $folders = Folder::orderBy('id', 'DESC')->get();
        // $folders = Folder::orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.disbursements.index', compact('folders'));
    }

    
    public function carla()
    {
        $assigns = Assign::where('user_id', 12)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.encargados.carla', compact('assigns'));
        // return $assigns;
    }
    public function alex()
    {
        $assigns = Assign::where('user_id', 9)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.encargados.alex', compact('assigns'));
        // return $assigns;
    }
    public function roxana()
    {
        $assigns = Assign::where('user_id', 10)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.encargados.roxana', compact('assigns'));
        // return $assigns;
    }
    public function mariela()
    {
        $assigns = Assign::where('user_id', 18)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.encargados.mariela', compact('assigns'));
        // return $assigns;
    }
    public function veronica()
    {
        $assigns = Assign::where('user_id', 11)->orderBy('id', 'DESC')->paginate(10);
        return view('user.folders.encargados.veronica', compact('assigns'));
        // return $assigns;
    }

    

    public function assignCom()
    {        
        $com = User::role('COMERCIAL')->get();
        $jn = User::role('JEFE NACIONAL')->get();
        $jas = User::role('JEFE DE AGENCIA')->get();
        $ass = User::role('ASESOR')->get();
        $users = $com->merge( $jn->merge($jas->merge($ass)));
        $folders = Folder::orderBy('id', 'DESC')->get();
        $user = User::role('COMERCIAL')->first();
        $assigns = Assign::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.assigns.index', compact('assigns', 'users', 'folders'));
    }

    public function assignEN()
    {        
        $com = User::role('COMERCIAL')->get();
        $jn = User::role('JEFE NACIONAL')->get();
        $jas = User::role('JEFE DE AGENCIA')->get();
        $ass = User::role('ASESOR')->get();
        $users = $com->merge( $jn->merge($jas->merge($ass)));
        $folders = Folder::orderBy('id', 'DESC')->get();
        $user = User::role('JEFE NACIONAL')->first();
        $assigns = Assign::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.assigns.index', compact('assigns', 'users', 'folders'));
    }
}
