<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Dashboard\CustomersController;
use App\Http\Controllers\Dashboard\FrequentlyAskedQuestionController;
use App\Http\Controllers\Dashboard\OrderLinesController;
use App\Http\Controllers\Dashboard\ReservationTypesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReservationController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('reserve/{id}', [ReservationController::class, 'index'])->name('reserve.index');
    Route::post('reserve/{id}', [ReservationController::class, 'store'])->name('reserve.store');

    Route::get('thanks/{id}', [ReservationController::class, 'thanks'])->name('reserve.thanks');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AuthenticationController::class, 'loginPost']);
});

Route::middleware('auth')->group(function () {
    Route::get('account', [AccountController::class, 'account'])->name('account');

    Route::resource('orders', OrdersController::class)->only(['index', 'show']);
});

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('', [\App\Http\Controllers\Dashboard\HomeController::class, 'home'])->name('home');

    Route::resource('customers', CustomersController::class);
    Route::resource('orders', \App\Http\Controllers\Dashboard\OrdersController::class);
    Route::resource('reservation-types', ReservationTypesController::class);
    Route::resource('orderLines', OrderLinesController::class);
    Route::resource('frequently-asked-questions', FrequentlyAskedQuestionController::class);
});
