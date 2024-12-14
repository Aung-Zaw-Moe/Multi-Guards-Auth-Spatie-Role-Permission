<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthAdmin\AdminNewPasswordController;
use App\Http\Controllers\AuthAdmin\AdminPasswordController;
use App\Http\Controllers\AuthAdmin\AdminPasswordResetLinkController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. All of the
| routes are loaded by the RouteServiceProvider, and assigned to the "web"
| middleware group.
|
*/

/** Seller Route (currently commented out) */
Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerController::class, 'Index'])->name('seller_login_form');
    Route::post('/login/owner', [SellerController::class, 'SellerLogin'])->name('seller.login');
    Route::get('/dashboard', [SellerController::class, 'Dashboard'])->name('seller.dashboard')->middleware('seller');
    Route::get('/logout', [SellerController::class, 'Sellerlogout'])->name('seller.logout')->middleware('seller');
    Route::get('/register', [SellerController::class, 'SellerRegister'])->name('seller.register')->middleware('seller');
    Route::post('/create', [SellerController::class, 'SellerRegisterCreate'])->name('seller.register')->middleware('seller');
});

/** End Seller Route */

/** Default Route */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/** User Profile Routes */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

/** Admin Routes */
Route::prefix('admin')->group(function () {

    // Admin Login and Dashboard
    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout')->middleware('admin');

    // Forgot Password & Reset Password Routes
    Route::get('forgot-password', [AdminPasswordResetLinkController::class, 'create'])->name('admin.password.request');
    Route::post('forgot-password', [AdminPasswordResetLinkController::class, 'store'])->name('admin.password.email');
    Route::get('reset-password/{token}', [AdminNewPasswordController::class, 'create'])->name('admin.password.reset');
    Route::post('reset-password', [AdminNewPasswordController::class, 'store'])->name('admin.password.store');
    Route::put('password', [AdminPasswordController::class, 'update'])->name('password.update');
});

/** End Admin Routes */

/** Spatie Roles & Permissions Routes */
Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

Route::resource('users', UserController::class);
Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

/** End Spatie Roles & Permissions Routes */
