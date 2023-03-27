<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('isUser')->group(function () {
    //CategoryController
    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('/createCategory' , [CategoryController::class, 'create']);
    Route::post('/updateCategory/{id}' , [CategoryController::class, 'update']);
    Route::get('/delete/{id}' , [CategoryController::class, 'delete']);
    Route::get('/updateCategoryPage/{id}' ,[CategoryController::class, 'updatePage'])->name('updateCategoryPage');
    //BlogController
    Route::get('/blogs' , [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogAll' , [BlogController::class, 'blogAll']);
    Route::get('/blogs/{id}' , [BlogController::class, 'show']);
    Route::post('/searchBlogs' , [BlogController::class, 'searchBlogs'])->name('searchBlogs');
    Route::post('/searchBlogOfCategory' , [BlogController::class, 'searchBlogOfCategory'])->name('searchBlogOfCategory');
    Route::post('/createBlog' , [BlogController::class, 'create']);
    Route::post('/updateBlog/{id}' , [BlogController::class, 'update']);
    Route::get('/destroy/{id}' , [BlogController::class, 'destroy']);
    Route::get('/createBlogPage' ,[BlogController::class, 'createPage'])->name('createBlogPage');
    Route::get('/updateBlogPage/{id}' ,[BlogController::class, 'updatePage'])->name('updateBlogPage');
    Route::post('/createComment/{id}/' , [BlogController::class, 'createComment'])->name('createComment');
});
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    //CommentController 
    Route::view('dashboard' , 'admin/dashboard');
    Route::get('comment', [CommentController::class, 'index']);
    Route::get('activeComment', [CommentController::class, 'activeComment']);
    Route::get('/updateComment/{id}' ,[CommentController::class, 'update']);
    Route::get('/destroyComment/{id}' ,[CommentController::class, 'destroy']);
    //DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index']);

});

//AuthController
Route::get('/logout', [AuthController::class , 'logout'] )->name('logout');
Route::post('/login', [AuthController::class , 'login'] )->name('login');
Route::post('/register', [AuthController::class , 'register'] )->name('register');

Route::view('/registerPage' , 'auth/register');
Route::view('/loginPage' , 'auth/login');
Route::view('/forgotPasswordPage' , 'auth/forgotPassword');


// Front Routes
Route::get('/blogOfCategory/{id}' , [HomeController::class, 'blogOfCategory']);
Route::get('/blog' , [HomeController::class, 'index']);
Route::get('/blog/{id}/' , [HomeController::class, 'show'])->name('blog_detail');








