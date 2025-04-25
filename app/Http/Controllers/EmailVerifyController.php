<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function show()
    {
        
        return view('email_verify');
    }
}
