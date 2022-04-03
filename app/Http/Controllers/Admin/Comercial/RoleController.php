<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name')->get();
        $permissions = Permission::get();
        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->permissions;
        $role->givePermissionTo($permissions);

        return back()->with('confirmation','Rol Registrado Correctamente');
    }

    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $role->save();
        $permissions = $request->permissions;
        $role->syncPermissions($permissions);

        return back()->with('confirmation','Rol Actualizado Correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('confirmation','Rol Eliminado Correctamente');
    }
}
