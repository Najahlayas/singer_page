<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

   public function index(Request $request)
{

    $permissions = Permission::with('roles')
    ->when($request->search,function($query) use($request){

        $query->where('name','like','%'.$request->search.'%');

    })
    ->paginate(5);


    return view('pages.permissions',compact('permissions'));

}


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|unique:permissions,name',
        ]
        ,[
            'name.required'=>'يرجى إدخال اسم الصلاحيه',
            'name.unique'=>'هذه الصلاحيه موجوده بالفعل',

        ]
        );


        Permission::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);



        return redirect()
            ->route('permissions.index')
            ->with('success','تم إضافة الصلاحيه');
    }



   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:permissions,name,' . $id,
    ],[
        'name.unique' => 'هذه الصلاحية موجودة بالفعل',
    ]);


    $permission = Permission::findOrFail($id);

    $permission->update([
        'name' => $validated['name']
    ]);


    return redirect()
        ->route('permissions.index')
        ->with('success','تم تعديل الصلاحية بنجاح');
}



    public function destroy($id)
    {

        Permission::findOrFail($id)->delete();

  return redirect()
            ->route('permissions.index')
            ->with('success','تم حذف الصلاحيه');
    }


}
