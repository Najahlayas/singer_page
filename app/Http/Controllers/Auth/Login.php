<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Import the User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        // 1. Validation for empty fields/format
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صحيح.',
            'password.required' => 'حقل كلمة المرور مطلوب.',
        ]);

        // 2. Check if the user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Email not found - attach error to 'email' field
            return back()->withErrors([
                'email' => 'هذا البريد الإلكتروني غير مسجل لدينا.',
            ])->onlyInput('email');
        }

        // 3. Try to log in (Check password)
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Password failed - attach error to 'password' field
            return back()->withErrors([
                'password' => 'كلمة المرور التي أدخلتها غير صحيحة.',
            ])->onlyInput('email');
        }

        // 4. Success
        $request->session()->regenerate();
        if ($user->hasRole('admin'))
            {
                return redirect('/dashboard');
            }
                return redirect()->intended('/news');
    }
}
