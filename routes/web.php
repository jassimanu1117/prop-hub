<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Admin\AdminAuthController;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\AdminProfileController;
use App\Http\Controllers\Dashboard\Admin\AdminCategoryController;
use App\Http\Controllers\Dashboard\Admin\AdminBrandController;
use App\Http\Controllers\Dashboard\Admin\AdminProductController;
use App\Http\Controllers\Dashboard\Admin\AdminProductDetailController;
use App\Http\Controllers\Dashboard\Admin\AdminAccessoryController;
use App\Http\Controllers\Dashboard\Admin\AdminOrdersController;
use App\Http\Controllers\Dashboard\Admin\AdminOrderItemsController;
use App\Http\Controllers\Dashboard\Admin\AdminSiteSettingsController;
use App\Http\Controllers\Dashboard\Admin\AdminPropertyCategoryController;
use App\Http\Controllers\Auth\User\UserAuthController;
use App\Http\Controllers\Auth\User\RegisterController;
use App\Http\Controllers\Auth\User\ForgotPasswordController;
use App\Http\Controllers\Auth\User\ResetPasswordController;
use App\Http\Controllers\Dashboard\User\UserDashboardController;
use App\Http\Controllers\Dashboard\User\UserWishlistController;
use App\Http\Controllers\Dashboard\User\UserCartController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====================
// Frontend Routes
// ====================

Route::get('/', [HomeController::class, 'index'])->name('home');

// ====================
// Admin Routes
// ====================

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin (login only)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    // Authenticated Admin (Super Admin + Admin)
    Route::middleware(['auth:admin', 'role:Super Admin,Admin'])->group(function () {
    //Dashboard Route    
        Route::get('/dashboard', [AdminDashboardController::class, 'showAdminDashboard'])
        ->name('dashboard');
    //Profile routes
    // Profile page (view + edit form on same page)
    Route::get('profile', [AdminProfileController::class, 'index'])->name('profile.index');
    //Handle profile update
    Route::post('profile/update', [AdminProfileController::class, 'update'])->name('profile.update');

  Route::get('/property/categories', [AdminPropertyCategoryController::class, 'index'])->name('property.categories.index');
  Route::get('/property/categories/create', [AdminPropertyCategoryController::class, 'create'])->name('property.categories.create');
  Route::post('/property/categories/store', [AdminPropertyCategoryController::class, 'store'])->name('property.categories.store');
  Route::get('/property/categories/{id}/edit', [AdminPropertyCategoryController::class, 'edit'])->name('property.categories.edit');
  Route::put('/property/categories/{id}', [AdminPropertyCategoryController::class, 'update'])->name('property.categories.update');
   Route::delete('/property/categories/{id}', [AdminPropertyCategoryController::class, 'destroy'])->name('property.categories.destroy');

    //Categories Routes
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Brand Routes
        Route::get('/brands', [AdminBrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [AdminBrandController::class, 'create'])->name('brands.create');
        Route::post('/brands', [AdminBrandController::class, 'store'])->name('brands.store');
        Route::get('/brands/{id}/edit', [AdminBrandController::class, 'edit'])->name('brands.edit');
        Route::put('/brands/{id}', [AdminBrandController::class, 'update'])->name('brands.update');
        Route::delete('/brands/{id}', [AdminBrandController::class, 'destroy'])->name('brands.destroy'); 

       

        // Accessory Routes
        Route::get('/accessory', [AdminAccessoryController::class, 'index'])->name('accessory.index');
        Route::get('/accessory/create', [AdminAccessoryController::class, 'create'])->name('accessory.create');
        Route::post('/accessory', [AdminAccessoryController::class, 'store'])->name('accessory.store');
        Route::get('/accessory/{id}/edit', [AdminAccessoryController::class, 'edit'])->name('accessory.edit');
        Route::put('/accessory/{id}', [AdminAccessoryController::class, 'update'])->name('accessory.update');
        Route::delete('/accessory/{id}', [AdminAccessoryController::class, 'destroy'])->name('accessory.destroy');  

        // Product Routes
        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
         Route::get('/get-sizes/{gender}', [AdminProductController::class, 'getSizes'])->name('get.sizes');
        Route::get('/products/brands/{category_id}', [AdminProductController::class, 'brands'])->name('products.brands');
        Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy'); 
        // Delete a single product image via AJAX
        Route::delete('/products/image/{id}', [AdminProductController::class, 'deleteImage'])
     ->name('products.image.delete');
       Route::get('/products/{id}/view', [AdminProductDetailController::class, 'show'])
        ->name('products.view');

    // Orders Routes
    Route::get('/orders', [AdminOrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/items', 
    [AdminOrderItemsController::class, 'orderItems']
)->name('orders.items');
Route::delete('/orders/{order}', [AdminOrdersController::class, 'destroy'])
    ->name('orders.destroy');


Route::get('/site-settings', [AdminSiteSettingsController::class, 'index'])
     ->name('site.settings.index');
//Handle profile update
Route::post('site-settings', [AdminSiteSettingsController::class, 'update'])->name('site.settings.update');

      
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});


// ====================
// User Routes
// ====================

Route::middleware('guest:web')->group(function () {
    // Registration
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('user.register');

    // Login
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');

    // Forgot/Reset Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('user.password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('user.password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('user.password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('user.password.update');
});

Route::middleware(['auth:web', 'role:User'])->group(function () {
    /*User Dashboard*/ 
    Route::get('/user/dashboard', [UserDashboardController::class, 'showUserDashboard'])
        ->name('user.dashboard');
    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');
});
