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
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('pages.users')->with('success', 'تم إضافة المستخدم بنجاح');
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
    ]);

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
