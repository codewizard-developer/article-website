<?php
namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
class ArticleController extends Controller
{
    public function submitArticle(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'abstract' => 'required|string|max:500',
            'category' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'supporting-docs' => 'nullable|array',
            'supporting-docs.*' => 'file|mimes:pdf,doc,docx,txt,jpg,jpeg,png,gif|max:10240',
            'link' => 'nullable|url'  // Validation for the 'link' field
        ]);
        \Log::info('Link:', ['link' => $request->link]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $article = new Article();
        $article->title = $request->title;
        $article->abstract = $request->abstract;
        $article->category_id = $request->category;
        $article->author_name = $request->name;
        $article->author_email = $request->email;
        $article->content = $request->content;
        $article->link = $request->link; 
        
        try {
            // Fetch fresh user data from database
            $user = \App\Models\User::find(auth()->id());
    
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found.'
                ], 404);
            }
    
            // Check if user has sufficient article_stock
            if ($user->article_stock <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'You do not have enough article stock to submit.'
                ], 403);
            }
    
            // Create the article
            $article = Article::create([
                'title' => $request->title,
                'abstract' => $request->abstract,
                'category_id' => $request->category,
                'content' => $request->content,
                'author_name' => $request->name,
                'author_email' => $request->email,
                'user_id' => $user->id,
                'link' => $request->link // Save the link
            ]);
    
            // Handle file uploads
            if ($request->hasFile('supporting-docs')) {
                $files = [];
                foreach ($request->file('supporting-docs') as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('articles', 'public');
                        $files[] = $path;
                    } else {
                        return response()->json([
                            'success' => false,
                            'message' => 'Error uploading file: ' . $file->getErrorMessage()
                        ], 422);
                    }
                }
                $article->supporting_files = json_encode($files);
                $article->save();
            }
    
            // Handle tags (optional)
            if ($request->has('tags')) {
                $article->tags = json_encode($request->tags);
                $article->save();
            }
    
            $user->decrement('article_stock');
    
            return response()->json([
                'success' => true,
                'message' => 'Article submitted successfully!',
                'article_id' => $article->id
            ]);
    
        } catch (\Exception $e) {
            \Log::error('Article submission error: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit article. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
    
public function detailarticle(){
    return view('postdetail');
}
public function show($id)
{
    $article = Article::where('verify', true)->findOrFail($id);

    // Increment the views by 1
    $article->increment('views');

    return view('postdetail', compact('article'));
}

public function like($id)
{
    $article = Article::where('id', $id)->where('verify', true)->first();

    if (!$article) {
        return response()->json(['message' => 'Article not found or not verified'], 404);
    }

    // Check if the user has already liked this article
    $user = Auth::user();
    if ($user->likedArticles()->where('article_id', $article->id)->exists()) {
        return response()->json(['message' => 'You have already liked this article'], 400);
    }

    // Add the like for the article
    $article->likes += 1;
    $article->save();

    // Add this like to the pivot table
    $user->likedArticles()->attach($article->id);

    // Return the updated like count
    return response()->json(['success' => true, 'likes' => $article->likes]);
}
public function search(Request $request)
{
    // Correctly accessing query parameters
    $query = $request->query('query');  // Use 'query' for GET parameters
    $city = $request->query('city');
    $state = $request->query('state');
    $min_price = $request->query('min_price');
    $max_price = $request->query('max_price');

    // Initialize the query builder
    $articleQuery = Article::where('verify', true); // Ensure only verified articles are considered

    // Apply search only by title
    if ($query) {
        $articleQuery->where('title', 'like', '%' . $query . '%');
    }

  

    // Fetch filtered articles
    $articles = $articleQuery->get();  // Get the results of the filtered query

    // Fetch other necessary data for categories, recent, most liked, most viewed
    $categories = Category::get();

    $recentArticles = Article::where('verify', true)
                              ->orderBy('created_at', 'desc') // Order by recent first
                              ->paginate(4);

    $mostLikedArticles = Article::where('verify', true)
                                ->orderBy('likes', 'desc') // Order by most liked
                                ->paginate(4);

    $mostViewedArticles = Article::where('verify', true)
                                 ->orderBy('views', 'desc') // Order by most viewed
                                 ->paginate(4);

    // Return the results to the view
    return view('search', compact('articles', 'categories', 'recentArticles', 'mostLikedArticles', 'mostViewedArticles'));
}

public function authuseraticle(){
    $user = Auth::user();
    $articles = $user->articles()->paginate(10); // Added pagination with 10 items per page
    return view('myarticle', compact('articles'));
}


}