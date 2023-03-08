<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicescategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebNotificationController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userss', CreateChat::class)->name('users');
Route::get('/chat{key?}', Main::class)->name('chat');
//Route::get('orderdetails/{id}',CreateChat::class )->name('orderdetails');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function () {
    Route::get('dashboard', 'dashboard');
    Route::get('login', 'index')->name('login');
    Route::post('custom-login', 'customLogin')->name('login.custom');
    Route::get('registration', 'registration')->name('register-user');
    Route::post('custom-registration', 'customRegistration')->name('register.custom');
    Route::get('signout',  'signOut')->name('signout');
});

Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::group(['middleware' => 'auth'], function ($router) {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index')->name('profile');
        Route::get('profileUpdate/{id}', 'profileUpdate')->name('profileUpdate');
        Route::post('saveEditProfile', 'saveEditProfile')->name('saveEditProfile');
        Route::get('changePassword', 'changePassword')->name('changePassword');
        Route::post('changePasswordDone', 'changePasswordDone')->name('changePasswordDone');
    });

    Route::controller(CategoriesController::class)->group(function () {
        Route::get('categoriess', 'index')->name('categoriess');
        Route::get('orderDetails/{id}', 'orderDetails')->name('orderDetails');
        Route::get('country/{id}', 'gettowns');
    });


    Route::controller(OrderController::class)->group(function () {
        Route::post('createOrder', 'createOrder')->name('createOrder');
        Route::get('peopleOrders', 'peopleOrders')->name('peopleOrders');
        Route::get('getorders', 'getorders')->name('getorders');
        Route::get('orderdetails/{id}', 'orderdetails')->name('orderdetails');
        Route::get('orderNotificationDetails/{id}/{notification_id}', 'orderNotificationDetails')->name('orderNotificationDetails');
        Route::post('orderComment', 'orderComment')->name('orderComment');
        Route::get('allOrders', 'allOrders')->name('allOrders');
        Route::get('companyOrders', 'companyOrders')->name('companyOrders');
        Route::get('endOrder/{id}', 'endOrder')->name('endOrder');
        Route::get('endOrderDone/{id}', 'endOrderDone')->name('endOrderDone');
        Route::get('rePublishOrder/{id}', 'rePublishOrder')->name('rePublishOrder');
        Route::get('addToWishlist/{id}', 'addToWishlist')->name('addToWishlist');
        Route::get('favorites', 'favorites')->name('favorites');
    });

    Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
    Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
    Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
});





Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'adminLogin'])->name('save.admin.login');

Route::group(['middleware' => 'auth:admin'], function ($router) {
    Route::get('index', [AdminController::class, 'index']);

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
