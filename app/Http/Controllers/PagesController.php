<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PagesController extends Controller
{
    //
public function showarticlepage(){
    $categories = Category::get();
    return view('submitarticle',compact('categories'));
}
public function homepage(){
    return view('index');
}

public function viewuser($id)
{
    // Get the authenticated user
    $user = Auth::user();

    // Check if a user is authenticated
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
    }

    // Get all articles by the user
    $articles = $user->articles; // Assuming the relationship 'articles' is defined in the User model

    // Get total article count
    $articleCount = $articles->count();

    // Get only verified articles count
    $verifiedCount = $articles->where('verify', true)->count();

    return view('edit-user-byuser', compact('user', 'articles', 'articleCount', 'verifiedCount'));
}
public function contactuss(){
    return view('contactus');
}
public function plans(){
    return view('plans');
}


}
