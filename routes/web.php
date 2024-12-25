<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Index;
use App\Livewire\News\Category\Cate;
use App\Livewire\News\Category\CreateCate;
use App\Livewire\News\Post\ListOfPosts;
use App\Livewire\News\Post\CreatePost;
use App\Livewire\News\UserConfig\UserList;
use App\Livewire\News\UserConfig\CreateUser;

use App\Http\Controllers\HomeController;
use App\Livewire\Counter;

Route::get('/',Index::class)->name('index');

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
Route::get('/posts/edit-post', CreatePost::class)->middleware('auth')->name('edit-cate');


Route::get('/users', UserList::class)->middleware('auth')->name('users');
Route::get('/users/create-user', CreateUser::class)->middleware('auth')->name('create-user');
Route::get('/users/edit-user', CreateUser::class)->middleware('auth')->name('edit-cate');

Route::get('/home', [HomeController::class, 'index']);