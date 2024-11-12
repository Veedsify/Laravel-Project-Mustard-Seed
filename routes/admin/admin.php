<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBlogsController;
use App\Http\Controllers\Admin\AdminCampaignCategoriesController;
use App\Http\Controllers\Admin\AdminCampaingsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminCommentsController;
use App\Http\Controllers\Admin\AdminDonationController;
use App\Http\Controllers\Admin\AdminEventsController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\AdminReviewsController;
use App\Http\Controllers\Admin\AdminUsersController;

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
        Route::post('/image/upload',[AdminCategoriesController::class, 'upload'])->name('admin.categories.upload');
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
        Route::prefix("categories")->group(function () {
            Route::get('/', [AdminCampaignCategoriesController::class, 'categories'])->name('admin.campaigns.categories');
            Route::get('/create', [AdminCampaignCategoriesController::class, 'createCategory'])->name('admin.campaigns.categories.create');
            Route::post('/store', [AdminCampaignCategoriesController::class, 'storeCategory'])->name('admin.campaigns.categories.store');
            Route::get('/edit/{id}', [AdminCampaignCategoriesController::class, 'editCategory'])->name('admin.campaigns.categories.edit');
            Route::post('/update/{id}', [AdminCampaignCategoriesController::class, 'updateCategory'])->name('admin.campaigns.categories.update');
        });
    });

    Route::prefix("users")->group(function () {
        Route::get('/', [AdminUsersController::class, 'index'])->name('admin.users');
        Route::get('/create', [AdminUsersController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [AdminUsersController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{id}', [AdminUsersController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update');
    });

    Route::prefix("donations")->group(function () {
        Route::get('/', [AdminDonationController::class, 'index'])->name('admin.donations');
        Route::get('/create', [AdminDonationController::class, 'create'])->name('admin.donations.create');
        Route::post('/store', [AdminDonationController::class, 'store'])->name('admin.donations.store');
        Route::get('/edit/{id}', [AdminDonationController::class, 'edit'])->name('admin.donations.edit');
        Route::post('/update/{id}', [AdminDonationController::class, 'update'])->name('admin.donations.update');
    });

    Route::prefix("events")->group(function(){
        Route::get('/', [AdminEventsController::class, 'index'])->name('admin.events');
        Route::get('/create', [AdminEventsController::class, 'create'])->name('admin.events.create');
        Route::post('/store', [AdminEventsController::class, 'store'])->name('admin.events.store');
        Route::get('/edit/{id}', [AdminEventsController::class, 'edit'])->name('admin.events.edit');
        Route::post('/update/{id}', [AdminEventsController::class, 'update'])->name('admin.events.update');
        Route::prefix("categories")->group(function(){
            Route::get('/', [AdminEventsController::class, 'categories'])->name('admin.events.categories');
            Route::get('/create', [AdminEventsController::class, 'createCategory'])->name('admin.events.categories.create');
            Route::post('/store', [AdminEventsController::class, 'storeCategory'])->name('admin.events.categories.store');
            Route::get('/edit/{id}', [AdminEventsController::class, 'editCategory'])->name('admin.events.categories.edit');
            Route::post('/update/{id}', [AdminEventsController::class, 'updateCategory'])->name('admin.events.categories.update'); 
        });
    });

    Route::get("/reviews", [AdminReviewsController::class, 'index'])->name('admin.reviews');
});
