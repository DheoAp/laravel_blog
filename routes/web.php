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
Route::get('/kategori/list',[KategoriController::class, 'index']);
Route::post('/kategori/proses',[KategoriController::class, 'store' ]);
Route::get('/kategori/{kategori:slug}',[KategoriController::class, 'show']);
Route::get('/kategori/edit/{kategori:slug}',[KategoriController::class, 'edit']);
  Route::patch('/kategori/edit/{kategori:slug}',[KategoriController::class, 'update']);
Route::get('/kategori/delete/{kategori:slug}',[KategoriController::class, 'alertDelete']);
  Route::delete('/kategori/delete/{kategori:slug}',[KategoriController::class, 'delete']);

// Tag
Route::get('/tag', function () {
  return 'Halaman Tag';
});
