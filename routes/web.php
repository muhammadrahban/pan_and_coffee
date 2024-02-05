<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserMediaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserDeviceController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CustomChangePasswordController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GeneralDonationController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VictimController;

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
// \Log::debug('luch bhi');
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::post('/setDeviceToken', [UserDeviceController::class, 'setDeviceToken']);
    Route::post('/removeDeviceToken', [UserDeviceController::class, 'removeDeviceToken']);

    Route::prefix('Activity')->group(function () {
        Route::get('/activitylist', [ActivityController::class, 'activityList'])->name('activity.list');
        Route::get('/activityCount', [ActivityController::class, 'countNotification'])->name('activity.count');
    });

    Route::prefix('product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/add', [ProductController::class, 'add'])->name('product.add');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');
    });
    Route::prefix('order')->group(function () {
        Route::get('/index', [orderController::class, 'index'])->name('order.index');
        Route::get('/detail/{order}', [orderController::class, 'detail'])->name('order.detail');
        Route::post('/update-status/{id}', [orderController::class, 'update'])->name('update.status');
    });


    Route::prefix('user')->group(function () {
        Route::get('/userList', [UserController::class, 'getUsers'])->name('user.list');
        Route::delete('/delete/{nannies}', [UserController::class, 'deleteNanny'])->name('nannies.delete');
        Route::get('/userinfo/{nanny}/{isView?}/{type?}', [UserController::class, 'nannyinfo'])->name('user.info');
        // Route::get('/getbookings/{nannies}', [AppoinmentController::class, 'getUserBooking'])->name('getUser.bookings');
        Route::put('/updateuser/{nannies}', [UserController::class, 'updateuser'])->name('nannies.update');
        Route::post('/updateuser/{vehicle_id}', [UserController::class, 'updatNannyVehicle'])->name('update.nannyvehicle');
        Route::get('/editNanny/{nannies}', [UserController::class, 'editNanny'])->name('nannies.edit');
    });


    Route::prefix('content')->group(function () {
        Route::get('/contentlist', [ContentController::class, 'getContains'])->name('content.list');
        Route::get('/contentForm', [ContentController::class, 'containForm'])->name('content.swform');
        Route::Post('/contentAdd', [ContentController::class, 'createContain'])->name('content.add');
        Route::delete('/deleteContent/{content}', [ContentController::class, 'deleteContent'])->name('content.delete');
        Route::get('/editContent/{content}', [ContentController::class, 'editContent'])->name('content.edit');
        Route::put('/updateContent/{content}', [ContentController::class, 'updateContent'])->name('content.update');
    });


    Route::prefix('setting')->group(function () {
        Route::get('/settinglist', [SettingController::class, 'getsettings'])->name('setting.list');
        Route::put('/updatereward/{setting}', [SettingController::class, 'update'])->name('setting.update');
    });
    Route::prefix('faqs')->group(function () {
        Route::get('/faqsList', [FaqsController::class, 'getfaqs'])->name('faqs.list');
        Route::get('/faqcreate', [FaqsController::class, 'create'])->name('faq.form');
        Route::post('/faqadd', [FaqsController::class, 'add'])->name('faqs.add');
        Route::get('/edit/{faqs}', [FaqsController::class, 'edit'])->name('faq.edit');
        Route::delete('/delete/{faqs}', [FaqsController::class, 'delete'])->name('faq.delete');
        Route::put('/update/{faqs}', [FaqsController::class, 'update'])->name('faq.update');
    });


    Route::prefix('userProfile')->group(function () {
        Route::get('/userProfile', [UserProfileController::class, 'userProfileForm'])->name('userProfile.Form');
        Route::put('/userProfileUpdate', [UserProfileController::class, 'userProfileUpdate'])->name('userProfile.Update');
    });
    Route::prefix('userMedia')->group(function () {
        Route::get('/userMedia/{userMedia}', [UserMediaController::class, 'mediaAprove'])->name('userMedia.aprove');
        Route::get('/userMediaDelete/{userMedia}', [UserMediaController::class, 'mediaDelete'])->name('userMedia.delete');
    });
    Route::prefix('updatePassword')->group(function () {

        Route::Put('/updatePassword', [CustomChangePasswordController::class, 'updatePassword'])->name('update.Password');
        Route::get('/update.PasswordForm', [CustomChangePasswordController::class, 'updatePasswordForm'])->name('update.PasswordForm');
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::get('/clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    // composer dump-autoload
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    return 'clear all';
})->name('LP');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
