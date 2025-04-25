<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showform(){
        return view('userlogin');
    }
    public function validate(Request $request)
    {
        // Validate incoming data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        // Auth attempt (checks DB)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Secure the session
            return redirect()->intended('/');
        }
    
        // If auth fails
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }
}
