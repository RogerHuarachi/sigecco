<?php

namespace App\Http\Controllers\Admin\Comercial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->name]);
        return back()->with('confirmation','Rol Registrado Correctamente');
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->save();
        return back()->with('confirmation','Rol Actualizado Correctamente');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('confirmation','Rol Eliminado Correctamente');
    }
}
