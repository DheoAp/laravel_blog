<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Blog
Route::get('/blog',[BlogController::class, 'index']);
Route::get('/create',[BlogController::class, 'create']);
  Route::post('/store',[BlogController::class, 'store']);
Route::get('/blog/{blog:slug}',[BlogController::class, 'show']);
Route::get('/blog/edit/{blog:slug}',[BlogController::class, 'edit']);
  Route::PATCH('/blog/edit/{blog:slug}',[BlogController::class, 'update']);
Route::DELETE('/blog/hapus/{blog:slug}',[BlogController::class, 'delete']);

// Kategori
Route::get('/kategori/{kategori:slug}',[KategoriController::class, 'show']);
