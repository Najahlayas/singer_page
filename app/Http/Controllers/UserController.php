<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
public function index(Request $request)
{
    $users = User::query();

    if($request->search){

        $users->where(function($query) use ($request){

            $query->where('name','like','%'.$request->search.'%')
                  ->orWhere('email','like','%'.$request->search.'%');

        });

    }

    $users = $users->paginate(5);

    $roles = Role::all();

    return view('pages.users', compact('users','roles'));
}
  public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required|exists:roles,name',
    ],[
        'name.required' => 'يرجى إدخال اسم المستخدم',
        'name.string' => 'اسم المستخدم يجب أن يكون نصاً',
        'name.max' => 'اسم المستخدم طويل جداً',

        'email.required' => 'يرجى إدخال البريد الإلكتروني',
        'email.email' => 'يرجى إدخال بريد إلكتروني صحيح',
        'email.unique' => 'هذا المستخدم أضيف بالفعل',

        'password.required' => 'يرجى إدخال كلمة المرور',
        'password.min' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل',

        'role.required' => 'يرجى اختيار دور المستخدم',
        'role.exists' => 'الدور المحدد غير موجود',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'status' => 'active',
    ]);

    $user->assignRole($validated['role']);

    return redirect()
        ->route('users.index')
        ->with('success', 'تمت إضافة المستخدم بنجاح');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
    $user = User::findOrFail($id);

    return view('pages.users-edit', compact('user'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => 'required|email|unique:users,email,' . $id,
        'role'   => 'required',
        'status' => 'required',
    ],['email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.']
    );

    $user = User::findOrFail($id);

    $user->update([
        'name'   => $request->name,
        'email'  => $request->email,
        'status' => $request->status,
    ]);

    $user->syncRoles($request->role);

    return redirect()->route('users.index')
        ->with('success', 'تم تعديل المستخدم بنجاح');
}
    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
{
    if (auth()->id() == $id) {
        return redirect()->route('users.index')
            ->with('error', 'لا يمكنك حذف الحساب الحالي');
    }

    $user = User::findOrFail($id);

    $user->delete();

    return redirect()->route('users.index')
        ->with('success', 'تم حذف المستخدم بنجاح');
}
}
