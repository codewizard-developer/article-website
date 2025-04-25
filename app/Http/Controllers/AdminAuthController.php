<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash; // Import the Auth facade
use App\Models\User;
use Illuminate\Support\Facades\Session;


class AdminAuthController extends Controller
{
    // Method to display the dashboard with search functionality
    public function show(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('username', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        if ($request->filled('plan')) {
            $query->where('plan', $request->plan);
        }

        $perPage = $request->get('per_page', 10);
        $users = $query->paginate($perPage)->appends($request->all());

        return view('dashboard.dashboard', compact('users'));
    }
  
    public function login(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to find the admin by email
        $admin = Admin::where('email', $request->email)->first();
    
        // Check if the admin exists and if the password matches (plain text comparison)
        if ($admin && $admin->password == $request->password) {
            // Password is correct, set the admin in the session
            Session::put('admin', $admin);
    
            // Redirect to the admin dashboard with the correct route name
            return redirect()->route('dashboard.dashboard');
        }
    
        // Authentication failed, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'));
    }

    // Method to authenticate the admin
   
}
