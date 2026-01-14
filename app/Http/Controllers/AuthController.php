<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Create admin user if not exists
        $adminEmail = 'admin@test.com';
        $adminUser = \App\Models\User::where('email', $adminEmail)->first();
        
        if (!$adminUser) {
            $adminUser = \App\Models\User::create([
                'name' => 'Admin User',
                'email' => $adminEmail,
                'password' => Hash::make('password123'),
            ]);
        }

        // Verify credentials using Hash::check
        if ($email === $adminUser->email && Hash::check($password, $adminUser->password)) {
            // Set session variable for admin login
            Session::put('admin_logged_in', true);
            Session::put('admin_user_id', $adminUser->id);
            Session::put('admin_user_name', $adminUser->name);
            
            return redirect()->route('admin.dashboard')
                ->with('success', 'Welcome back, Admin!');
        }

        return back()->with('error', 'Invalid credentials. Try admin@test.com / password123');
    }

    public function logout(Request $request)
    {
        Session::forget(['admin_logged_in', 'admin_user_id', 'admin_user_name']);
        Session::flush();
        
        return redirect('/admin/login')->with('success', 'Logged out successfully.');
    }
}
