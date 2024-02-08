<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\NavigatingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/posts',[PostController::class,'index'])->name('posts.index')->middleware('ensureLogin');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('ensureLogin');
Route::post('/register',[AuthController::class,'store'])->name('register.store');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login.form');
Route::post('/login',[AuthController::class,'login'])->name('login.process');
Route::get('/verifyEmail/{token}',[VerificationController::class ,'verifyEmail'])->name('verify.email');
Route::get('/succussfullyConfirmation',function (){
    return "you've successfully confirmated";
})->name('verified_successfully');


Route::get('/google/redirect',[AuthController::class,'redirectToGoogle'])->name('google.redirect');
Route::get('/google/responseData',[AuthController::class,'redirectGoogleData']);


Route::get('/github/redirect',[AuthController::class,'redirectToGithub'])->name('github.redirect');
Route::get('/github/responseData',[AuthController::class,'redirectGithubData']);


Route::get('/linkedin/redirect',[AuthController::class,'redirectTolinkedin'])->name('linkedin.redirect');
Route::get('/linkedin/responseData',[AuthController::class,'redirectlinkedinData']);
Route::get('/linkedin/termsOfServices',function (){
    return "Be clear";
});

Route::get('/linkedin/policy',function (){
    return "Be clear in policy";
});


// profile routes
Route::get('/members/profile',[NavigatingController::class,'profile'])->name('profile.index')->middleware('ensureLogin');
Route::put('/profile/update',[AdminController::class,'update'])->name('profile.update');

// visitedPublishers
Route::get('/posts/publishers',[NavigatingController::class,'show'])->name('publishers.show')->middleware('ensureLogin');

// description
Route::get('/posts/{postId}',[PostController::class,'show'])->name('posts.show')->middleware('ensureLogin');

// search for posts
Route::post('/posts/search',[PostController::class,'search'])->name('posts.search');
Route::get('/posts/{postId}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('ensureLogin');
Route::put('/posts/update',[PostController::class,'update'])->name('posts.update');

Route::delete('/posts/{postId}',[PostController::class,'destroy'])->name('posts.destroy');

// log out
Route::get('/profile/logout',[NavigatingController::class,'logout'])->name('profile.logout');



