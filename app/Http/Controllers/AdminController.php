<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class AdminController extends Controller
{
    private function isAdminLoggedIn(Request $request)
    {
        return session('admin_logged_in') || Cache::get('admin_session_' . $request->ip());
    }


    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('dashboard.dashboard')->with('success', 'User deleted successfully');
    }

    public function deleteBasic()
    {
        User::where('plan', 'basic')->delete();
        return response()->json(['message' => 'All basic users deleted successfully']);
    }

    public function deleteUnverified()
    {
        User::whereNull('email_verified_at')->delete();
        return response()->json(['message' => 'All unverified users deleted']);
    }

    public function bulkDelete(Request $request)
    {
        User::whereIn('id', $request->ids)->delete();
        return response()->json(['message' => 'Selected users deleted']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'article_stock' => 'nullable|integer',
            'about' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
            'plan' => 'nullable|string|in:basic,premium',
            'userverify' => 'nullable|boolean',
            'email_verified_at' => 'nullable|date',
            'remember_token' => 'nullable|string',
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => $request->email_verified_at,
            'email_code' => $request->email_code,
            'phone' => $request->phone,
            'country' => $request->country,
            'address' => $request->address,
            'article_stock' => $request->article_stock,
            'about' => $request->about,
            'userverify' => $request->userverify ?? 0,
            'plan' => $request->plan,
            'remember_token' => $request->remember_token,
        ]);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('dashboard.dashboard')->with('success', 'User updated successfully!');
    }
    public function showCategories()
    {
        $categories = Category::paginate(10);  // Change 10 to the number of items per page you want.
        return view('dashboard.categories', compact('categories'));
    }
    
    public function storeCategory(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|string|max:255',
        ]);
    
        Category::create([
            'cat_name' => $request->cat_name,
        ]);
    
        return redirect()->route('dashboard.categories')->with('success', 'Category added successfully');
    }
    
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return redirect()->route('dashboard.categories')->with('success', 'Category deleted successfully');
    }
    

}
