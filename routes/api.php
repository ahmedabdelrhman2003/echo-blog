<?php

use App\Http\Controllers\Api\v1\AuthorController;
use App\Http\Controllers\Dashboard\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::group(function () {
//     Route::get('/admin', function () {
//         // Route::get('/user', [AdminController::class, 'index']);
//     });
// });
Route::prefix('author')->middleware('auth:sanctum')->group(function () {
    Route::post('/store-article', [AuthorController::class, 'storeArticle'])->name('api.article.store');
    Route::get('/get-articles', [AuthorController::class, 'allArticles'])->name('api.article.all');
    Route::get('/profile', [AuthorController::class, 'profile'])->name('api.author.profile');
    Route::get('/categories', [AuthorController::class, 'getCategories'])->name('api.category.get');
});
//