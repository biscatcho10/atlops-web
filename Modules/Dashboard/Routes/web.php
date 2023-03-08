<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;
use Modules\Dashboard\Http\Controllers\LocaleController;

// Route::middleware('dashboard')->prefix('dashboard')->as('dashboard.')->group(function () {
//     Route::get('locale/{locale}', [LocaleController::class, 'update'])->name('locale');
//     Route::get('/', [DashboardController::class, 'index'])->name('home');
// });

