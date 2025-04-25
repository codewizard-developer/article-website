<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
class PagesController extends Controller
{
    //
public function showarticlepage(){
    $categories = Category::get();
    return view('index',compact('categories'));
}

public function viewuser($id)
{
    $user = User::findOrFail($id);
    return view('edit-user-byuser', compact('user'));
}

}
