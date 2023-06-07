<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::group(['middleware' => 'only_guest'], function () {
    // login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    // register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // dashboard
    Route::get('/admin_dashboard', [AdminController::class, 'admin_index'])->middleware('only_admin');
    Route::get('/admin_unit_dashboard', [AdminUnitController::class, 'admin_unit_index'])->middleware('only_admin_unit');
    Route::get('/dashboard', [UserController::class, 'user_index'])->middleware('only_client');

    // items
    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/item_add', [ItemController::class, 'add']);
    Route::post('/item_add', [ItemController::class, 'store']);

    // categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/category_add', [CategoryController::class, 'add']);
    Route::post('/category_add', [CategoryController::class, 'store']);
    Route::get('/category_edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('/category_edit/{slug}', [CategoryController::class, 'update']);
    Route::get('/category_delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('/category_destroy/{slug}', [CategoryController::class, 'destroy']);
    Route::get('/category_deleted_list', [CategoryController::class, 'deleted_categories']);
    Route::get('/category_restore/{slug}', [CategoryController::class, 'restore']);

    // bookings
    Route::get('/bookings', [BookingController::class, 'index']);

    // usage list
    Route::get('/list', [ListController::class, 'index']);

    // user list
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user_edit/{slug}', [UserController::class, 'edit']);
    Route::put('/user_edit/{slug}', [UserController::class, 'update_role']);

    // profile
    Route::get('/profile', [ProfileController::class, 'index']);
});
