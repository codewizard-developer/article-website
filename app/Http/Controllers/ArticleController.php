<?php
namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function submitArticle(Request $request)
    {
        // Validate the form inputs with better error handling
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
            'supporting-docs.*' => 'file|mimes:pdf,doc,docx,txt,jpg,jpeg,png,gif|max:10240', // Added image formats
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create a new article record
            $article = Article::create([
                
                'title' => $request->title,
                'abstract' => $request->abstract,
                'category_id' => $request->category,
                'content' => $request->content,
                'author_name' => $request->name,
                'author_email' => $request->email,
                'user_id' => auth()->id()
                
            ]);

            // Handle file uploads
            if ($request->hasFile('supporting-docs')) {
                $files = [];
                foreach ($request->file('supporting-docs') as $file) {
                    // Check if there are any errors with the file
                    if ($file->isValid()) {
                        $path = $file->store('articles', 'public');
                        $files[] = $path;
                    } else {
                        // Handle the error (log or return response with error message)
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

            // Return success response
            return response()->json([
                'success' => true, 
                'message' => 'Article submitted successfully!',
                'article_id' => $article->id
            ]);

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Article submission error: ' . $e->getMessage());
            
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit article. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}