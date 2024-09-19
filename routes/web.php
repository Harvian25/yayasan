<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonatedItemController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/', [MainPageController::class, 'index'])->name('home');

// Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checklevel:donor', 'prevent-back-history'])->group(function () {
    
    Route::get('/donation/donate/{item_id}', [DonationController::class, 'create']);
    Route::get('/donation/category/{category_id}', [ItemController::class, 'showItem']);
    Route::get('/donation/all-items', [ItemController::class, 'showAllItems']);
    Route::post('/donation/store', [DonationController::class, 'store'])->name('storeDonation');
    Route::get('/donation/category/', [ItemController::class, 'showCategory']);
    Route::get('/donation/notification/{id}', [DonationController::class, 'showDetailNotification'])->name('notifications.detail');
    Route::get('/donation/notification/markasread/{id}', [DonationController::class, 'markAsReadNotification'])->name('notifications.markAsRead');
});



Route::middleware(['auth', 'checklevel:admin', 'prevent-back-history'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::put('/donations/{donation}/approve', [DashboardController::class, 'approveDonation'])
        ->name('donations.approve');
  
    Route::resource('category', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('news', NewsController::class);
    Route::get('contacts', [ContactController::class, 'index']);
    Route::delete('contacts/delete/{id}', [ContactController::class, 'destroy']);
});


