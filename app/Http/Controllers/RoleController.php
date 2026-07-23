<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::withCount('users')
            ->with('permissions')
            ->when($request->search, function ($query) use ($request) {

                $query->where('name', 'like', '%' . $request->search . '%');

            })
            ->paginate(5);


        return view('pages.roles', compact('roles'));
    }



    public function create()
    {
        $permissions = Permission::all();

        return view('pages.roles-create', compact('permissions'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required'
        ]);


        $role = Role::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);


        if($request->permissions)
        {
            $role->syncPermissions($request->permissions);
        }


        return redirect()
            ->route('roles.index')
            ->with('success','تم إضافة الدور');
    }




  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required'
    ]);


    $role = Role::findOrFail($id);


    $role->name = $request->name;
    $role->save();


    app()[\Spatie\Permission\PermissionRegistrar::class]
        ->forgetCachedPermissions();


    return redirect()
        ->route('roles.index')
        ->with('success','تم تعديل الدور');
}


    public function destroy($id)
    {

        $role = Role::findOrFail($id);


        $role->delete();


        return redirect()
            ->route('roles.index')
            ->with('success','تم حذف الدور');

    }

}
