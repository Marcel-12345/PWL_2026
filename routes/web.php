<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;

//Route::get('/hello', function () {
// return 'Hello World';
//});

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function () {
    return 'World';
});

//Route::get('/', function () {
// return 'Selamat Datang';
//});

Route::get('/', [PageController::class, 'index']);

//Route::get('/about', function () {
// return 'NIM: 244107040141 | Nama: Anselmus Marcel Putra Andria';
//});

Route::get('/about', [PageController::class, 'about']);

Route::get('/user/{name}', function ($name) {
    return 'Nama saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', function ($id) {
// return 'Halaman Artikel dengan ID '.$id;
// });

Route::get('/articles/{id}', [PageController::class, 'articles']);

Route::get('/user/{name?}', function ($name = 'John') {
    return 'Nama saya ' . $name;
});

Route::get('/user/profile', function () {
    //
})->name('profile');
Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');
// // Generating URLs...
// $url = route('profile');
// // Generating Redirects...
// return redirect()->route('profile');

// Route::middleware(['first', 'second'])->group(function () {
//  Route::get('/', function () {
//  // Uses first & second middleware...
//  });
// Route::get('/user/profile', function () {
//  // Uses first & second middleware...
//  });
// });
// Route::domain('{account}.example.com')->group(function () {
//  Route::get('user/{id}', function ($account, $id) {
//  //
//  });
// });
// Route::middleware('auth')->group(function () {
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/post', [PostController::class, 'index']);
// Route::get('/event', [EventController::class, 'index']);
// });

// Route::prefix('admin')->group(function () {
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/post', [PostController::class, 'index']);
// Route::get('/event', [EventController::class, 'index']);
// });

// Route::redirect('/here', '/there');

// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

Route::resource('photos', PhotoController::class)->only([
    'index',
    'show'
]);

    //Route::resource('photos', PhotoController::class)->except([
    // 'create', 'store', 'update', 'destroy'
    //]);
;

//Route::get('/greeting', function () {
//    return view('hello', ['name' => 'Marcel']);
//});

//Route::get('/greeting', function () { 
//return view('blog.hello', ['name' => 'Marcel']); 
//});

Route::get('/greeting', [WelcomeController::class, 
'greeting']); 

// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;

// 1. Home
Route::get('/home', [HomeController::class, 'index']);

// 2. Products (route prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// 3. User (route parameter)
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// 4. Sales / POS
Route::get('/sales', [SalesController::class, 'index']);