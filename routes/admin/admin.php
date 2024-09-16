<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBlogsController;
use App\Http\Controllers\Admin\AdminCampaingsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminCommentsController;
use App\Http\Controllers\Admin\AdminLocationController;

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::prefix("blogs")->group(function () {
        Route::get('/', [AdminBlogsController::class, 'index'])->name('admin.blogs');
        Route::get('/create', [AdminBlogsController::class, 'create'])->name('admin.blogs.create');
        Route::post('/store', [AdminBlogsController::class, 'store'])->name('admin.blogs.store');
        Route::get('/edit/{id}', [AdminBlogsController::class, 'edit'])->name('admin.blogs.edit');
        Route::post('/update/{id}', [AdminBlogsController::class, 'update'])->name('admin.blogs.update');
    });
    Route::prefix("categories")->group(function () {
        Route::get('/', [AdminCategoriesController::class, 'index'])->name('admin.categories');
        Route::get('/create', [AdminCategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [AdminCategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{id}', [AdminCategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [AdminCategoriesController::class, 'update'])->name('admin.categories.update');
    });

    Route::prefix("comments")->group(function () {
        Route::get('/', [AdminCommentsController::class, 'index'])->name('admin.comments');
        Route::get('/edit/{id}', [AdminCommentsController::class, 'edit'])->name('admin.comments.edit');
        Route::post('/update/{id}', [AdminCommentsController::class, 'update'])->name('admin.comments.update');
    });

    Route::prefix("location")->group(function () {
        Route::get('/', [AdminLocationController::class, 'index'])->name('admin.location');
        Route::get('/create', [AdminLocationController::class, 'create'])->name('admin.location.create');
        Route::post('/store', [AdminLocationController::class, 'store'])->name('admin.location.store');
        Route::get('/edit/{id}', [AdminLocationController::class, 'edit'])->name('admin.location.edit');
        Route::post('/update/{id}', [AdminLocationController::class, 'update'])->name('admin.location.update');
    });

    Route::prefix("campaigns")->group(function () {
        Route::get('/', [AdminCampaingsController::class, 'index'])->name('admin.campaigns');
        Route::get('/create', [AdminCampaingsController::class, 'create'])->name('admin.campaigns.create');
        Route::post('/store', [AdminCampaingsController::class, 'store'])->name('admin.campaigns.store');
        Route::get('/edit/{id}', [AdminCampaingsController::class, 'edit'])->name('admin.campaigns.edit');
        Route::post('/update/{id}', [AdminCampaingsController::class, 'update'])->name('admin.campaigns.update');
    });
});
