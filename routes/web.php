<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\ManageAuthorController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\DataTableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login.form');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/admin-login', [AuthController::class, 'login'])->name('auth.login');
Route::group(['prefix' => 'admin'], function () {

    Route::delete('/delete-author/{id}', [ManageAuthorController::class, 'deleteAuthor'])->name('manageAuthor.delete');
    Route::get('/view-author/{id}', [ManageAuthorController::class, 'showAuthor'])->name('manageAuthor.view');
    Route::get('/add-author', [ManageAuthorController::class, 'createAuthor'])->name('manageAuthor.create');
    Route::post('/store-author', [ManageAuthorController::class, 'storeAuthor'])->name('manageAuthor.store');
    Route::get('/authors', [ManageAuthorController::class, 'getAuthors'])->name('manageAuthor.getAuthors');
    Route::get('/suspend-author/{id}', [ManageAuthorController::class, 'suspendAuthor'])->name('manageAuthor.suspend');
    Route::get('/activate-author/{id}', [ManageAuthorController::class, 'activateAuthor'])->name('manageAuthor.activate');
    Route::get('get-authors-data-table', [DataTableController::class, 'getAuthorsDataTable'])->name('data-table.authors');
    Route::get('get-categories-data-table', [DataTableController::class, 'getCategoriesDataTable'])->name('data-table.categories');
    Route::get('get-articles-data-table', [DataTableController::class, 'getArticlesDataTable'])->name('data-table.articles');
    Route::get('get-pending-articles-data-table', [DataTableController::class, 'getPendingArticlesDataTable'])->name('data-table.pending-articles');

    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update-category', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/category-featured/{id}', [CategoryController::class, 'featured'])->name('category.featured');
    Route::get('/category-un-featured/{id}', [CategoryController::class, 'unFeatured'])->name('category.un-featured');


    Route::get('/un-featured-article/{id}', [ArticleController::class, 'unFeatured'])->name('article.un-featured');
    Route::get('/featured-article/{id}', [ArticleController::class, 'featured'])->name('article.featured');
    Route::get('/articles', [ArticleController::class, 'articles'])->name('article.all');
    Route::get('/pending-articles', [ArticleController::class, 'pendingArticles'])->name('articles.pending');
    Route::get('/approve-article/{id}', [ArticleController::class, 'approve'])->name('article.approve');
    Route::get('/reject-article/{id}', [ArticleController::class, 'reject'])->name('article.reject');
    Route::get('/suspend-article/{id}', [ArticleController::class, 'suspend'])->name('article.suspend');
    Route::get('/activate-article/{id}', [ArticleController::class, 'activate'])->name('article.activate');
    Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.view');
});



Route::get('create-password/{id}', [AuthController::class, 'createPassword'])->name('password.create');
Route::post('store-password', [AuthController::class, 'storePassword'])->name('password.store');
Route::post('resend-link/{id}', [AuthController::class, 'resendLink'])->name('resendLink');