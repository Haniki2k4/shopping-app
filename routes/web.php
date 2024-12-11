<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\News\Category\Cate;
use App\Livewire\News\Category\CreateCate;
use App\Livewire\News\Post\ListOfPosts;
use App\Livewire\News\Post\CreatePost;

use App\Http\Controllers\HomeController;
use App\Livewire\Counter;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/category', Cate::class)->middleware('auth')->name('category');
Route::get('/category/create-cate', CreateCate::class)->middleware('auth')->name('create-cate');
Route::get('/category/edit-cate', CreateCate::class)->middleware('auth')->name('edit-cate');

Route::get('/posts', ListOfPosts::class)->middleware('auth')->name('posts');
Route::get('/posts/create-post', CreatePost::class)->middleware('auth')->name('create-post');


Route::get('/home', [HomeController::class, 'index']);