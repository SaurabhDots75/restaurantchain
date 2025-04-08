<?php

use App\Http\Controllers\Admin\AclController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\EnqReportController;
use App\Http\Controllers\Admin\ProductAttributeController;
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

    Route::get('/verifyotp', [LoginController::class, 'verifyotp'])->name('verifyotp');
    Route::post('/verifyotpsubmit', [LoginController::class, 'verifyotpsubmit'])->name('verifyotpsubmit');
    // Login Routes
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration Routes
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Password Reset Routes
    // Routes for Forget Password
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    });

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
    Route::middleware(['authadmin'])->group(function () {

        Route::get('/home', [HomeController::class, 'adminHome'])->name('home');
        Route::resource('/roles', RoleController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/restaurants', RestaurantController::class);
        Route::resource('/product-pages', ProductController::class);
        Route::resource('/posts', PostController::class);
        Route::resource('/pages', PageController::class);
        Route::resource('/faqcategories', FaqCategoryController::class);
        Route::resource('/faqs', FaqController::class);
        Route::resource('acl', AclController::class);

        // Settings Route
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/{userid}', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/settings/basic-setting', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings-update', [SettingController::class, 'update']);
        // Header Settings Route
        Route::get('/settings/header-settings', [SettingController::class, 'headerSetting'])->name('header-settings');
        Route::post('/header-settings-update', [SettingController::class, 'footerSettingUpdate']);
        // Footer Settings Route
        Route::get('/settings/footer-settings', [SettingController::class, 'footerSetting'])->name('footer-settings');
        Route::post('/footer-settings-update', [SettingController::class, 'footerSettingUpdate']);

        //Appreance > Menus Routes
        Route::get('/settings/menus', [MenuController::class, 'index'])->name('menus');
        Route::post('/menus/save', [MenuController::class, 'save']);

        // Post Category Routes
        Route::get('/posts-categories', [PostCategoryController::class, 'index'])->name('postcategories');
        // Route::get('/posts-categories/create/{catslug?}', [PostCategoryController::class, 'createForm'])->name('create');
        // Route::post('/posts-categories/add', [PostCategoryController::class, 'add'])->name('add');
        Route::post('/get-postcategories', [PostCategoryController::class, 'getPostCategory'])->name('get-postcategories');
        Route::post('/change-postcategories', [PostCategoryController::class, 'status']);
        Route::post('/delete-postcategories', [PostCategoryController::class, 'delete']);

        Route::get('image-gallery', [ImageGalleryController::class, 'index']);
        Route::post('image-gallery', [ImageGalleryController::class, 'upload'])->name('image-gallery');
        Route::delete('image-gallery-delete', [ImageGalleryController::class, 'destroy'])->name('image-gallery-delete');

        Route::get('/reports/enq-report', [EnqReportController::class, 'index'])->name('enq-report');
        Route::get('/reports/proofs-quotes-report', [EnqReportController::class, 'proofsQuotesReports'])->name('proofs-quotes-report');
        Route::delete('/reports/enq-report', [EnqReportController::class, 'destroy']);
        Route::delete('/reports/proofs-quotes-report', [EnqReportController::class, 'destroyProofsQuotes']);

        // Product Category Routes
        Route::get('/products/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/products/categories/create/{catslug?}', [CategoryController::class, 'create'])->name('create');
        Route::post('/products/categories/add', [CategoryController::class, 'add'])->name('add');
        Route::delete('/products/delete-categories', [CategoryController::class, 'destroy']);
        Route::get('/categories/hierarchy', [CategoryController::class, 'getHierarchy'])->name('categories.hierarchy');

        Route::resource('/products/product-attributes', ProductAttributeController::class)
        ->names([
            'index' => 'products.product-attributes.index',
            'create' => 'products.product-attributes.create',
            'store' => 'products.product-attributes.store',
            // 'show' => 'products.product-attributes.show',
            'edit' => 'products.product-attributes.edit',
            'update' => 'products.product-attributes.update',
            'destroy' => 'products.product-attributes.destroy',
        ]);

        Route::get('/upload-image', [ImageUploadController::class, 'index'])->name('upload.index');
        Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');
        Route::get('/images/fetch', [ImageUploadController::class, 'fetchAll'])->name('images.fetch');


        //resturants route 
        Route::post('/restaurants/toggle-status', [RestaurantController::class, 'toggleStatus'])->name('restaurants.toggle-status');

        //acl route 
        Route::get('admin/acl/{id}', [AclController::class, 'delete'])->name('acl.delete');



            

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
