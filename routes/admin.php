<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\ServicescategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TownController;
use Illuminate\Support\Facades\Route;

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


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'adminLogin'])->name('save.admin.login');

Route::prefix('dashboard')->middleware(['auth:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);


    Route::controller(CountryController::class)->group(function () {
        Route::get('country', 'index')->name('index.country');
        Route::get('addCountry', 'addCountry')->name('addCountry');
        Route::post('addCountry', 'addCountrydone')->name('addCountrydone');
        Route::get('editCountry/{id}', 'editCountry')->name('editCountry');
        Route::post('editCountrydone/{id}', 'editCountrydone')->name('editCountrydone');
        Route::post('deleteCountry', 'deleteCountry')->name('deleteCountry');
        Route::get('townsCountry/{id}', 'townsCountry')->name('townsCountry');
    });

    Route::controller(TownController::class)->group(function () {
        Route::get('addTown/{id}', 'addTown')->name('addTown');
        Route::post('addTown', 'addTowndone')->name('addTowndone');
        Route::get('editTown/{id}', 'editTown')->name('editTown');
        Route::post('editTown/{id}', 'editTowndone')->name('editTowndone');
        Route::post('deleteTown', 'deleteTown')->name('deleteTown');
    });

    Route::controller(CategoriesController::class)->group(function () {
        Route::get('categories', 'dashIndex')->name('index.category');
        Route::get('addCategory', 'addCategory')->name('addCategory');
        Route::post('addCategory', 'addCategoryDone')->name('addCategoryDone');
        Route::get('editCategory/{id}', 'editCategory')->name('editCategory');
        Route::post('editCategorydone/{id}', 'editCategorydone')->name('editCategorydone');
        Route::post('deleteCategory', 'deleteCategory')->name('deleteCategory');
    });

    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('subCategries/{id}', 'subCategries')->name('subCategries');
        Route::get('addSubCategory/{id}', 'addSubCategory')->name('addSubCategory');
        Route::post('addSubCategory', 'addSubCategorydone')->name('addSubCategorydone');
        Route::get('editSubCategory/{id}', 'editSubCategory')->name('editSubCategory');
        Route::post('editSubCategory/{id}', 'editSubCategorydone')->name('editSubCategorydone');
        Route::post('deleteSubCategory', 'deleteSubCategory')->name('deleteSubCategory');
    });

    Route::controller((ServicescategoryController::class))->group(function () {
        Route::get('serviceCategries/{id}', 'serviceCategries')->name('serviceCategries');
        Route::get('addServiceCategory/{id}', 'addServiceCategory')->name('addServiceCategory');
        Route::post('addServiceCategory', 'addServiceCategorydone')->name('addServiceCategorydone');
        Route::get('editServiceCategory/{id}', 'editServiceCategory')->name('editServiceCategory');
        Route::post('editServiceCategory/{id}', 'editServiceCategorydone')->name('editServiceCategorydone');
        Route::post('deleteServiceCategory', 'deleteServiceCategory')->name('deleteServiceCategory');
    });
});
