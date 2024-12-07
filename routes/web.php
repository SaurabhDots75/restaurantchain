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
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageGalleryController;

Route::get('/', function () {
    return view('front.index');
});
Route::get('/product-listing', function () {
    return view('front.product-listing');
});
Route::get('/product-details', function () {
    return view('front.product-details');
});

Route::get('/cart', function () {
    return view('front.cart');
});

Route::get('/checkout', function () {
    return view('front.checkout');
});

Route::get('/contact-us', function () {
    return view('front.contact-us');
});

Route::get('/blog', function () {
    return view('front.blog');
});

Route::get('/blog-detail', function () {
    return view('front.blog-detail');
});

Route::get('/privacy-notice', function () {
    return view('front.privacy-notice');
});

Route::get('/conditions-of-use', function () {
    return view('front.conditions-of-use');
});

Route::get('/shipping-info', function () {
    return view('front.shipping-info');
});

Route::get('/quotes-proofs', function () {
    return view('front.quotes-proofs');
});

Route::get('/sitemap', function () {
    return view('front.sitemap');
});

Route::get('/order', function () {
    return view('front.order');
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
    // Routes for Forget Password
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


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
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/{userid}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings-update', [SettingController::class, 'update']);
        // Header Settings Route
        Route::get('/header-settings', [SettingController::class, 'headerSetting'])->name('header-settings');
        Route::post('/header-settings-update', [SettingController::class, 'footerSettingUpdate']);
        // Footer Settings Route
        Route::get('/footer-settings', [SettingController::class, 'footerSetting'])->name('footer-settings');
        Route::post('/footer-settings-update', [SettingController::class, 'footerSettingUpdate']);

        //Appreance > Menus Routes
        Route::get('/menus', [MenuController::class, 'index'])->name('menus');
        Route::post('/menus/save', [MenuController::class, 'save']);

        // Post Category Routes
        Route::get('/posts-categories', [PostCategoryController::class, 'index'])->name('postcategories');
        Route::get('/posts-categories/create/{catslug?}', [PostCategoryController::class, 'createForm'])->name('create');
        Route::post('/posts-categories/add', [PostCategoryController::class, 'add'])->name('add');
        Route::post('/get-postcategories', [PostCategoryController::class, 'getPostCategory'])->name('get-postcategories');
        Route::post('/change-postcategories', [PostCategoryController::class, 'status']);
        Route::post('/delete-postcategories', [PostCategoryController::class, 'delete']);

        Route::get('image-gallery', [ImageGalleryController::class, 'index']);
        Route::post('image-gallery', [ImageGalleryController::class, 'upload'])->name('image-gallery');
        Route::delete('image-gallery-delete', [ImageGalleryController::class, 'destroy'])->name('image-gallery-delete');
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
