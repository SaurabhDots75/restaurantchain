<?php

use App\Http\Controllers\Admin\AclController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\RestaurantController;



Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('admin.home');
    }
    return redirect()->route('admin.login');
});

Route::prefix('/')->name('admin.')->group(function () {
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(['authguest'])->group(function () {
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);


    // Password Reset Routes
    // Routes for Forget Password
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    });

    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['authadmin'])->group(function () {
        Route::get('/home', [HomeController::class, 'adminHome'])->name('home');
        Route::resource('/roles', RoleController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/restaurants', RestaurantController::class);
        Route::resource('acl', AclController::class);

        // Settings Route
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/{userid}', [ProfileController::class, 'update'])->name('profile.update');
    
        Route::get('image-gallery', [ImageGalleryController::class, 'index']);
        Route::post('image-gallery', [ImageGalleryController::class, 'upload'])->name('image-gallery');
        Route::delete('image-gallery-delete', [ImageGalleryController::class, 'destroy'])->name('image-gallery-delete');


        Route::get('/upload-image', [ImageUploadController::class, 'index'])->name('upload.index');
        Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');
        Route::get('/images/fetch', [ImageUploadController::class, 'fetchAll'])->name('images.fetch');

        //resturants route 
        Route::post('/restaurants/toggle-status', [RestaurantController::class, 'toggleStatus'])->name('restaurants.toggle-status');
        //acl route 
        Route::get('admin/acl/{id}', [AclController::class, 'delete'])->name('acl.delete');

    });

 
});
