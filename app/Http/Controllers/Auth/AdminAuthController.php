<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Try to find user by email (using username field as email)
        $user = User::where('email', $request->username)->first();

        if ($user && $user->isAdmin() && Hash::check($request->password, $user->password)) {
            // Update last login info
            $user->updateLastLogin($request->ip());
            
            // Store admin in session
            Session::put('admin_id', $user->id);
            Session::put('admin_username', $user->name);
            
            return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'login' => 'Email atau password salah, atau Anda bukan admin.',
        ])->withInput($request->only('username'));
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Session::forget(['admin_id', 'admin_username']);
        Session::flush();
        
        return redirect('/admin/login')->with('success', 'Logout berhasil!');
    }

    /**
     * Check if admin is authenticated
     */
    public static function check()
    {
        return Session::has('admin_id');
    }

    /**
     * Get current admin
     */
    public static function admin()
    {
        if (self::check()) {
            return User::find(Session::get('admin_id'));
        }
        return null;
    }
}