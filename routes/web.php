<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Index;
use App\Livewire\Home\ViewPost;
use App\Livewire\News\Category\Cate;
use App\Livewire\News\Category\CreateCate;
use App\Livewire\News\Post\ListOfPosts;
use App\Livewire\News\Post\CreatePost;
use App\Livewire\News\UserConfig\UserList;
use App\Livewire\News\UserConfig\CreateUser;

use App\Http\Controllers\HomeController;
use App\Livewire\Counter;

Route::get('/', Index::class)->name('index');
Route::get('/home/viewpost', ViewPost::class)->name('view-post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/category', Cate::class)->name('category');
Route::get('/category/create-cate', CreateCate::class)->name('create-cate');
Route::get('/category/edit-cate', CreateCate::class)->name('edit-cate');

Route::get('/posts', ListOfPosts::class)->name('posts');
Route::get('/posts/create-post', CreatePost::class)->name('create-post');
Route::get('/posts/edit-post', CreatePost::class)->name('edit-post');

Route::get('/users', UserList::class)->name('users');
Route::get('/users/create-user', CreateUser::class)->name('create-user');
Route::get('/users/edit-user', CreateUser::class)->name('edit-user');

Route::get('/home', [HomeController::class, 'index']);