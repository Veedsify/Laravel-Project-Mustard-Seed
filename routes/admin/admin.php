<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBlogsController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/blogs', [AdminBlogsController::class, 'index'])->name('admin.blogs');
    Route::get('/blogs/create', [AdminBlogsController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs/store', [AdminBlogsController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/edit/{id}', [AdminBlogsController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('/blogs/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blogs.update');
});


