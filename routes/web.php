<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




/** Seller Route  */

Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerController::class, 'Index'])->name('seller_login_form');
    Route::post('/login/owner', [SellerController::class, 'SellerLogin'])->name('seller.login');
    Route::get('/dashboard', [SellerController::class, 'Dashboard'])->name('seller.dashboard')->middleware('seller');
    Route::get('/logout', [SellerController::class, 'Sellerlogout'])->name('seller.logout')->middleware('seller');
    Route::get('/register', [SellerController::class, 'SellerRegister'])->name('seller.register')->middleware('seller');
    Route::post('/create', [SellerController::class, 'SellerRegisterCreate'])->name('seller.register')->middleware('seller');
});


/**End  Seller Route  */



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
// Spatie Roles &  Permissions Routes

// Route::group(['middleware' => ['role:system|admin']], function () {

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

Route::resource('users', App\Http\Controllers\UserController::class);
Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
// });
/** Admin Route  */

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout')->middleware('admin');
});


/**End  Admin Route  */
