<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;

Route::match(['GET','POST'],'contact-index', [ContactController::class, 'index'])->name('contact.index');
Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/{id}', [ContactController::class, 'show'])->name('contact.show');
Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::match(['PUT','PATCH'],'contact/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

Route::match(['GET','POST'],'home', [HomeController::class, 'index'])->name('home.index');

Route::match(['GET','POST'],'post-index', [PostController::class, 'index'])->name('post.index');
Route::get('post', [PostController::class, 'create'])->name('post.create');
Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::match(['PUT','PATCH'],'post/{id}', [PostController::class, 'update'])->name('post.update');
Route::delete('post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::match(['GET','POST'],'produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('produto', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('produto', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::match(['PUT','PATCH'],'produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

Route::match(['GET','POST'],'user', [UserController::class, 'index'])->name('user.index');
Route::get('user', [UserController::class, 'create'])->name('user.create');
Route::post('user', [UserController::class, 'store'])->name('user.store');
Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::match(['PUT','PATCH'],'user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


Route::redirect('/', 'home');
