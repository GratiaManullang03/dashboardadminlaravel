<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect root to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource routes for all tables
Route::resource('popups', PopupController::class);
Route::resource('headers', HeaderController::class);
Route::resource('why-choose-us', WhyChooseUsController::class);
Route::resource('product-categories', ProductCategoryController::class);
Route::resource('certifications', CertificationController::class);
Route::resource('footer', FooterController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

// Extra route for product details
Route::get('/products/{product}/details', [ProductDetailController::class, 'show'])->name('product-details.show');
Route::get('/products/{product}/details/edit', [ProductDetailController::class, 'edit'])->name('product-details.edit');
Route::put('/products/{product}/details', [ProductDetailController::class, 'update'])->name('product-details.update');