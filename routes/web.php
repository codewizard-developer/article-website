<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PaymentController;

Route::get('/search', [ArticleController::class, 'search'])->name('search.results');

Route::get('/plans', [PaymentController::class, 'showPlans'])->name('plans');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::get('/payment/thank-you', [PaymentController::class, 'thankYou'])->name('payment.thank-you');

Route::post('/articles/{id}/like', [ArticleController::class, 'like'])->name('articles.like');


Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/contactus',function(){
    return view('contactus');
});
Route::get('/user/plans',[PagesController::class,'plans']);
Route::post('/register', [RegisterController::class, 'store'])->name('register.user');
Route::post('/verify-code', [RegisterController::class, 'verifyCode']);
Route::post('/updateprofile', [RegisterController::class, 'updateprofile']);

Route::get('/signup-user', [EmailVerifyController::class, 'show']);
Route::get('/fix', function () {
    return view('man');
});

Route::get('/admin-login', function () {
    return view('dashboard.login');
});

Route::post('/authticate-admin', [AdminAuthController::class, 'login'])->name('admin.login.submit');


Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class, 'web'])->group(function () {
    Route::get('/user/edit/{id}', [AdminController::class, 'edit'])->name('user.edit'); // Edit user
    Route::get('/categories',[AdminController::class,'showcategories'])->name('dashboard.categories');
    Route::get('/admin-article', [AdminController::class, 'showarticle'])->name('articles.index');
    Route::delete('/delete-article/{id}', [AdminController::class, 'deleteArticle'])->name('articles.delete');
    Route::patch('/update-verify/{id}', [AdminController::class, 'updateVerify'])->name('articles.updateVerify');
    Route::post('/category/store', [AdminController::class, 'storeCategory'])->name('category.store');
    Route::delete('/category/delete/{id}', [AdminController::class, 'deleteCategory'])->name('category.delete');
    Route::get('/dashboard', [AdminAuthController::class, 'show'])->name('dashboard.dashboard');
    Route::delete('/user/{id}', [AdminController::class, 'delete'])->name('user.delete'); // Delete user by ID
    Route::delete('/users/delete-basic', [AdminController::class, 'deleteBasic'])->name('user.delete.basic'); // Delete users with 'basic' plan
    Route::delete('/users/delete-unverified', [AdminController::class, 'deleteUnverified'])->name('user.delete.unverified'); // Delete unverified users
    Route::post('/users/bulk-delete', [AdminController::class, 'bulkDelete'])->name('user.bulk.delete'); // Bulk delete users
    Route::post('/user/update/{id}', [AdminController::class, 'update'])->name('user.update'); // Update user

});



Route::get('/user-login',[UserAuthController::class,'showform'])->name('login');
Route::post('/user-login',[UserAuthController::class,'validate']);
Route::post('/logout', function () {
    Auth::logout(); 
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/')->with('success', 'You have been logged out.');
})->name('logout');


Route::get('/article',[PagesController::class,'showarticlepage']);
Route::post('/submit-article', [ArticleController::class, 'submitArticle'])->name('submit-article');
Route::get('/user/{id}', [PagesController::class, 'viewuser'])->name('user.updateuser');
Route::get('/',[PagesController::class,'homepage']);
Route::get('/view-article',[ArticleController::class,'detailarticle']);
Route::get('/user-articles',[ArticleController::class,'authuseraticle']);