<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        $agencies = Agency::orderBy('id')->get();
        $roles = Role::orderBy('name')->get();
        return view('admin.users.index', compact('users', 'roles', 'agencies'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'agency_id' => $request->agency_id
        ]);
        $role = $request->role;
        $user->assignRole($role);

        return back()->with('confirmation','Usuario Registrado Correctamente');
    }

    public function update(Request $request, User $user)
    {
        $roles = $user->roles;
        foreach($roles as $role){
            $user->removeRole($role);
        }

        $role = $request->role;
        $user->assignRole($role);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->agency_id = $request->agency_id;
        $user->save();

        return back()->with('confirmation','Usuario Actualizado Correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('confirmation','Usuario Eliminado Correctamente');
    }
}
