<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\News\Cate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('clients.home', ['name'=>'Nguyen Van A']);
})->name('home ');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/category',Cate::class)->middleware('auth')->name('category');