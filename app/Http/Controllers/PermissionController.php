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
        ]);


        Permission::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);


        return redirect()->route('permissions.index');

    }



    public function update(Request $request,$id)
    {

        $permission = Permission::findOrFail($id);


        $permission->update([
            'name'=>$request->name
        ]);


        return redirect()->route('permissions.index');

    }



    public function destroy($id)
    {

        Permission::findOrFail($id)->delete();


 return redirect()->route('permissions.index')
        ->with('success', 'تم حذف الصلاحيه بنجاح');
    }


}
