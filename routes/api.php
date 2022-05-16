<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;

Route::get('articles', [ArticleController::class, 'index'])->name('api.v1.articles.index');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('api.v1.articles.show');
Route::post('articles', [ArticleController::class, 'create'])->name('api.v1.articles.create');
