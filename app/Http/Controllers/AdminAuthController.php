<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function loginValidate(AdminLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()
                ->withErrors(['email' => 'Invalid login credentials'])
                ->withInput();
        }

        if (!auth()->user()->is_admin) {
            Auth::logout();

            return back()->withErrors([
                'email' => 'You are not authorized to access admin panel'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Welcome Admin!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


     public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully');
    }

}
