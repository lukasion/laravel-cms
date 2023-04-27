<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::get('/artykuly', [IndexController::class, 'articles'])->name('articles');
Route::get('/om-oss', [IndexController::class, 'aboutMe'])->name('aboutMe');
Route::get('/kontakt', [IndexController::class, 'contact'])->name('contact');

Route::prefix('zaloguj')->group(function () {
    Route::get('/', [UserController::class, 'loginForm'])->name('userLogin');
    Route::post('/', [UserController::class, 'login']);

    Route::post('/logout', [UserController::class, 'logout'])->name('userLogout');
});

Route::prefix('newsletter')->group(function () {
    Route::post('/', [NewsletterController::class, 'sign'])->name('newsletter');
    Route::get('/add', [NewsletterController::class, 'addForm'])->name('newsletterAdd');
    Route::post('/add', [NewsletterController::class, 'add']);
    Route::prefix('{id}')->group(function () {
        Route::get('/edit', [NewsletterController::class, 'editForm'])->name('newsletterEdit');
        Route::post('/edit', [NewsletterController::class, 'edit']);
    });
    Route::get('/list', [NewsletterController::class, 'list'])->name('newsletterList');
});

Route::prefix('categories')->group(function () {
    Route::match(['get', 'post'], '/list', [CategoryController::class, 'list'])->name('categoryList');
    Route::get('/add', [CategoryController::class, 'addForm'])->name('categoryAdd');
    Route::post('/add', [CategoryController::class, 'add']);
    Route::prefix('{id}')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/delete', [CategoryController::class, 'delete'])->name('categoryDelete');
        Route::get('/edit', [CategoryController::class, 'editForm'])->name('categoryEdit');
        Route::post('/edit', [CategoryController::class, 'edit']);
    });
});

Route::prefix('article')->group(function () {
    Route::match(['get', 'post'], '/add', [ArticleController::class, 'add']);
    Route::match(['get', 'post'], '/edit/{articleID}', [ArticleController::class, 'edit']);
    Route::match(['get', 'post'], '/delete/{articleID}', [ArticleController::class, 'delete']);
    
    Route::get('/search', [ArticleController::class, 'search'])->name('search');

    Route::get('/{articleFriendlyName}', [ArticleController::class, 'show'])->name('articleShow');
    Route::post('/{articleFriendlyName}', [ArticleController::class, 'comment']);
});

Route::prefix('comment')->group(function () {
    Route::prefix('{commentID}')->group(function () {
        Route::get('/delete', [CommentController::class, 'delete'])->name('commentDelete');
    });
});
