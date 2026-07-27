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

    $permissions = Permission::all();

    return view('pages.roles', compact('roles', 'permissions'));
}

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:roles,name'
        ],[
            'name.unique'=>'هذا الدور موجود بالفعل',

        ]
        );


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




 public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|unique:roles,name,' . $id,
        'permissions' => 'array',
    ],[
        'name.unique' => 'هذا الدور موجود بالفعل',
        'name.required' => 'يرجى إدخال اسم الدور',
    ]);

    $role = Role::findOrFail($id);

    $role->update([
        'name' => $request->name,
    ]);

    $role->syncPermissions($request->permissions ?? []);

    return redirect()
        ->route('roles.index')
        ->with('success', 'تم تعديل الدور بنجاح');
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
