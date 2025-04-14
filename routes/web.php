<?php

use App\Events\TestPusherEvent;
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
use App\Http\Controllers\Admin\EmailLogController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageGalleryController;
use App\Http\Controllers\Admin\EnqReportController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ImageUploadController;
use App\Http\Controllers\Admin\LookupController;
use App\Http\Controllers\Admin\LookupsController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\RestaurantProfileController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SubcategoryController;

// Route::get('/', function () {
//     return view('front.index');
// });
// Route::get('/product-listing', function () {
//     return view('front.product-listing');
// });
// Route::get('/product-details', function () {
//     return view('front.product-details');
// });

// Route::get('/cart', function () {
//     return view('front.cart');
// });

// Route::get('/checkout', function () {
//     return view('front.checkout');
// });

// Route::get('/contact-us', function () {
//     return view('front.contact-us');
// });

// Route::get('/blog', function () {
//     return view('front.blog');
// });

// Route::get('/blog-detail', function () {
//     return view('front.blog-detail');
// });

// Route::get('/privacy-notice', function () {
//     return view('front.privacy-notice');
// });

// Route::get('/conditions-of-use', function () {
//     return view('front.conditions-of-use');
// });

// Route::get('/shipping-info', function () {
//     return view('front.shipping-info');
// });

// Route::get('/quotes-proofs', function () {
//     return view('front.quotes-proofs');
// });

// Route::get('/sitemap', function () {
//     return view('front.sitemap');
// });

// Route::get('/order', function () {
//     return view('front.order');
// });




Route::prefix('/')->name('admin.')->group(function () {



    Route::any('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['authguest'])->group(function () {
        Route::get('/verifyotp', [LoginController::class, 'verifyotp'])->name('verifyotp');
        Route::post('/verifyotpsubmit', [LoginController::class, 'verifyotpsubmit'])->name('verifyotpsubmit');
        // Login Routes
        Route::get('', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('', [LoginController::class, 'login']);

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
        // Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    /*------------------------------------------
    --------------------------------------------
    All Admin Routes List
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['authadmin'])->group(function () {

        Route::get('restaurant-dashboard', [HomeController::class, 'restaurantDashboard'])->name('restaurant.dashboard');
        Route::get('dashboard', [HomeController::class, 'adminHome'])->name('home');
        Route::resource('/roles', RoleController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/restaurants', RestaurantController::class);
        Route::resource('/product-pages', ProductController::class);
        Route::resource('/posts', PostController::class);
        Route::resource('/pages', PageController::class);
        Route::resource('/faqcategories', FaqCategoryController::class);
        Route::resource('/faqs', FaqController::class);
        Route::resource('acl', AclController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubcategoryController::class);
        Route::resource('food_items', MenuItemController::class);
        Route::resource('menu-items', MenuItemController::class);


        //order routes
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');


        // lookups
        // Dynamic Lookup Management Routes
        Route::get('lookups/{type}', [LookupController::class, 'index'])->name('lookups.index');
        Route::get('lookups/{type}/create', [LookupController::class, 'create'])->name('lookups.create');
        Route::post('lookups/{type}', [LookupController::class, 'store'])->name('lookups.store');
        Route::get('lookups/{type}/{lookup}/edit', [LookupController::class, 'edit'])->name('lookups.edit');
        Route::put('lookups/{type}/{lookup}', [LookupController::class, 'update'])->name('lookups.update');
        Route::delete('lookups/{type}/{lookup}', [LookupController::class, 'destroy'])->name('lookups.destroy');



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


        Route::get('general-settings', [GeneralSettingsController::class, 'index'])->name('general-settings');


        // Email Templates Routes
        Route::get('email-templates', [EmailTemplateController::class, 'index'])->name('email-templates.index');
        Route::get('email-templates/create', [EmailTemplateController::class, 'create'])->name('email-templates.create');
        Route::post('email-templates', [EmailTemplateController::class, 'store'])->name('email-templates.store');
        Route::get('email-templates/{id}', [EmailTemplateController::class, 'show'])->name('email-templates.show');
        Route::get('email-templates/{id}/edit', [EmailTemplateController::class, 'edit'])->name('email-templates.edit');
        Route::put('email-templates/{id}', [EmailTemplateController::class, 'update'])->name('email-templates.update');
        Route::delete('email-templates/{id}', [EmailTemplateController::class, 'destroy'])->name('email-templates.destroy');
        Route::post('email-templates/{id}/toggle-status', [EmailTemplateController::class, 'toggleStatus'])->name('email-templates.toggle-status');
        Route::get('email-templates/{id}/preview', [EmailTemplateController::class, 'preview'])->name('email-templates.preview');

        // Email Logs Routes
        Route::get('email-logs', [EmailLogController::class, 'index'])->name('email-logs.index');
        Route::get('email-logs/{id}', [EmailLogController::class, 'show'])->name('email-logs.show');

        // Service Type Management Routes
        Route::get('service-type', [\App\Http\Controllers\Admin\ServiceTypeController::class, 'index'])->name('service-type.index');
        Route::put('service-type', [\App\Http\Controllers\Admin\ServiceTypeController::class, 'update'])->name('service-type.update');

        // Operating Hours Management
        Route::get('operating-hours', [\App\Http\Controllers\Admin\OperatingHoursController::class, 'index'])->name('operating-hours.index');
        Route::put('operating-hours', [\App\Http\Controllers\Admin\OperatingHoursController::class, 'update'])->name('operating-hours.update');
        

        Route::get('restaurant-profile', [RestaurantProfileController::class, 'edit'])->name('restaurant-profile.edit');
        Route::post('restaurant-profile', [RestaurantProfileController::class, 'update'])->name('restaurant-profile.update');

   
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
