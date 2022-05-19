<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', [PostController::class, 'index']);

// Blog
Route::get('/blog/{url}', [PostController::class, 'show'])->where('url', '[A-Za-z0-9\-]+');

// Admin
Route::get('/dashboard', [AdminController::class, 'home'])->middleware(['auth'])->name('dashboard');
Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware(['auth']);
Route::post('/admin/posts/store', [PostController::class, 'store'])->middleware(['auth']);
Route::get('/admin/posts/{id}/edit', [PostController::class, 'edit'])->middleware(['auth']);
Route::post('/admin/posts/{id}/edit', [PostController::class, 'update'])->middleware(['auth']);
Route::get('/admin/posts/{id}/delete', [PostController::class, 'destroy'])->middleware(['auth']);

// RSS
Route::feeds();

require __DIR__.'/auth.php';
