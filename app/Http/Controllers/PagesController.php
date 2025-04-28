<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
public function showarticlepage(){
    $categories = Category::get();
    return view('submitarticle',compact('categories'));
}
public function search(Request $request)
{
    $query = $request->input('query');
    $categories = Category::get();
    
    // Search in title, abstract, content, tags, and author_name
    $searchResults = Article::where('verify', true)
        ->where(function($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
              ->orWhere('abstract', 'LIKE', "%{$query}%")
              ->orWhere('content', 'LIKE', "%{$query}%")
              ->orWhere('tags', 'LIKE', "%{$query}%")
              ->orWhere('author_name', 'LIKE', "%{$query}%");
        })
        ->paginate(8);

    // Return a partial view to show the results
    if ($request->ajax()) {
        return view('partials.search-results', compact('searchResults', 'categories', 'query'));
    }

    return view('your-current-page', compact('searchResults', 'categories', 'query'));
}


public function apiSearch(Request $request)
{
    $query = $request->input('query');
    
    $articles = Article::where('verify', true)
        ->where(function($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
              ->orWhere('tags', 'LIKE', "%{$query}%");
        })
        ->select('id', 'title')
        ->limit(5)
        ->get();
        
    return response()->json($articles);
}

public function homepage()
{
    $categories = Category::get();

    // Fetch only verified articles for each category
    $recentArticles = Article::where('verify', true)
                              ->orderBy('created_at', 'desc') // Order by recent first
                              ->paginate(4);

    $mostLikedArticles = Article::where('verify', true)
                                ->orderBy('likes', 'desc') // Order by most liked
                                ->paginate(4);

    $mostViewedArticles = Article::where('verify', true)
                                 ->orderBy('views', 'desc') // Order by most viewed
                                 ->paginate(4);

    return view('index', compact('categories', 'recentArticles', 'mostLikedArticles', 'mostViewedArticles'));
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