<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;

Route::get('/', function () {
    return view('front.index');
});


Route::prefix('admin')->name('admin.')->group(function () {
        
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Routes
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Password Reset Routes
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);

    // Email Verification Routes
    Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');


    /*------------------------------------------
    --------------------------------------------
    All Normal Users Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['auth', 'user-access:user'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [HomeController::class, 'adminHome'])->name('home');
        Route::resource('/roles', RoleController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/posts', PostController::class);
        Route::resource('/pages', PageController::class);
        Route::resource('/faqcategories', FaqCategoryController::class);
        Route::resource('/faqs', FaqController::class);
        
        // Settings Route
		Route::get('/settings', [SettingController::class,'index'])->name('settings');
		Route::post('/settings-update', [SettingController::class,'update']);
        // Header Settings Route
		Route::get('/header-settings', [SettingController::class,'headerSetting'])->name('header-settings');
		Route::post('/header-settings-update', [SettingController::class,'footerSettingUpdate']);
		// Footer Settings Route
		Route::get('/footer-settings', [SettingController::class,'footerSetting'])->name('footer-settings');
		Route::post('/footer-settings-update', [SettingController::class,'footerSettingUpdate']);

        //Appreance > Menus Routes
		Route::get('/menus', [MenuController::class,'index'])->name('menus');
		Route::post('/menus/save', [MenuController::class,'save']);

        // Post Category Routes
		Route::get('/posts-categories',[PostCategoryController::class,'index'])->name('postcategories');
		Route::get('/posts-categories/create/{catslug?}',[PostCategoryController::class,'createForm'])->name('create');
		Route::post('/posts-categories/add',[PostCategoryController::class,'add'])->name('add');
		Route::post('/get-postcategories',[PostCategoryController::class,'getPostCategory'])->name('get-postcategories');
		Route::post('/change-postcategories',[PostCategoryController::class,'status']);
		Route::post('/delete-postcategories',[PostCategoryController::class,'delete']);
    });

    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['auth', 'user-access:manager'])->group(function () {
        Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    });
});
