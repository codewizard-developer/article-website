<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ArticleController;


// post apis
Route::post('/register', [RegisterController::class, 'store'])->name('register.user');
Route::post('/verify-code', [RegisterController::class, 'verifyCode']);
Route::post('/updateprofile', [RegisterController::class, 'updateprofile']);

// all views 
Route::get('/signup-user', [EmailVerifyController::class, 'show']);
Route::get('/fix', function () {
    return view('man');
});
// Admin Login and Dashboard
Route::get('/admin-login', function () {
    return view('dashboard.login');
});

Route::post('/authticate-admin', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// admin all routes after authentication
Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class, 'web'])->group(function () {
    Route::get('/user/edit/{id}', [AdminController::class, 'edit'])->name('user.edit'); // Edit user
    Route::get('/categories',[AdminController::class,'showcategories'])->name('dashboard.categories');
    Route::post('/category/store', [AdminController::class, 'storeCategory'])->name('category.store');
    Route::delete('/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('category.delete');
    Route::get('/dashboard', [AdminAuthController::class, 'show'])->name('dashboard.dashboard');
    Route::delete('/user/{id}', [AdminController::class, 'delete'])->name('user.delete'); // Delete user by ID
    Route::delete('/users/delete-basic', [AdminController::class, 'deleteBasic'])->name('user.delete.basic'); // Delete users with 'basic' plan
    Route::delete('/users/delete-unverified', [AdminController::class, 'deleteUnverified'])->name('user.delete.unverified'); // Delete unverified users
    Route::post('/users/bulk-delete', [AdminController::class, 'bulkDelete'])->name('user.bulk.delete'); // Bulk delete users
    Route::post('/user/update/{id}', [AdminController::class, 'update'])->name('user.update'); // Update user
    // routes
});


// user login  form 
Route::get('/user-login',[UserAuthController::class,'showform'])->name('login');
Route::post('/user-login',[UserAuthController::class,'validate']);
Route::post('/logout', function () {
    Auth::logout(); // Logs the user out
    session()->invalidate(); // Invalidates the session
    session()->regenerateToken(); // Regenerates CSRF token
    return redirect('/')->with('success', 'You have been logged out.');
})->name('logout');

// Article apis 
Route::get('/article',[PagesController::class,'showarticlepage']);
// In routes/web.php
Route::post('/submit-article', [ArticleController::class, 'submitArticle'])->name('submit-article');
Route::get('/user/{id}', [PagesController::class, 'viewuser'])->name('user.updateuser'); // Edit user
