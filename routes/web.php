<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::GET('/', function () {
  return view('welcome');
});


// Blog
Route::GET('/blog',[BlogController::class, 'index']);
Route::GET('/create',[BlogController::class, 'create']);
  Route::POST('/store',[BlogController::class, 'store']);
Route::GET('/blog/{blog:slug}',[BlogController::class, 'show']);
Route::GET('/blog/edit/{blog:slug}',[BlogController::class, 'edit']);
  Route::PATCH('/blog/edit/{blog:slug}',[BlogController::class, 'update']);
Route::DELETE('/blog/hapus/{blog:slug}',[BlogController::class, 'delete']);

// Kategori
Route::GET('/kategori/list',[KategoriController::class, 'index']);
Route::POST('/kategori/proses',[KategoriController::class, 'store' ]);
Route::GET('/kategori/{kategori:slug}',[KategoriController::class, 'show']);
Route::GET('/kategori/edit/{kategori:slug}',[KategoriController::class, 'edit']);
  Route::PATCH('/kategori/edit/{kategori:slug}',[KategoriController::class, 'update']);
Route::GET('/kategori/delete/{kategori:slug}',[KategoriController::class, 'alertDelete']);
  Route::DELETE('/kategori/delete/{kategori:slug}',[KategoriController::class, 'delete']);

// Tag
Route::GET('/tag',[TagController::class, 'index']);
Route::POST('/tag/proses',[TagController::class, 'store']);
Route::GET('/tag/hapus/{tag:slug}',[TagController::class, 'alertDelete']);
  Route::DELETE('/tag/hapus/{tag:slug}',[TagController::class, 'delete']);
