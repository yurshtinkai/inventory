<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [AuthController::class, 'index'])->name('index');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/log-out', [AuthController::class, 'logout'])->name('log-out');

// Contact page route
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/index', [ContactController::class, 'home'])->name('index');

//Route::get('/add-item', [ItemController::class, 'create'])->name('add-item-form');
Route::post('/store', [DashboardController::class, 'store'])->name('store');
Route::delete('/delete/{ItemID}', [DashboardController::class, 'destroy'])->name('destroy');

// Route::get('/item', [ItemController::class, 'index'])->name('item');
// Route::get('/user', [UserController::class, 'index'])->name('user');
// Route::get('/lostitem', [LostItemController::class, 'index'])->name('lostitem');

