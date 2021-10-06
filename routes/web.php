<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Dashboard\CustomersController;
use App\Http\Controllers\Dashboard\FrequentlyAskedQuestionController;
use App\Http\Controllers\Dashboard\OrderLinesController;
use App\Http\Controllers\Dashboard\ReservationTypesController;
use App\Http\Controllers\ExtraReservationController;
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

$subdomain = config('app.env') === 'production' ? '{park}.rezer.nl' : '{park}.rezer.test';
Route::domain($subdomain)->middleware(['organizationExists'])->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('reserve/{id}', [ReservationController::class, 'index'])->name('reserve.index');
    Route::post('reserve/{id}', [ReservationController::class, 'store'])->name('reserve.store');
    Route::get('thanks/{id}', [ReservationController::class, 'thanks'])->name('reserve.thanks');

    Route::middleware('auth')->group(function () {
        Route::get('addExtra/{order_id}/{extra_id}', [ExtraReservationController::class, 'index'])->name('addExtra.index');
        Route::post('addExtra/{order_id}/{extra_id}', [ExtraReservationController::class, 'store'])->name('addExtra.store');
        Route::get('extraThanks/{id}', [ExtraReservationController::class, 'thanks'])->name('addExtra.thanks');
    });

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticationController::class, 'login'])->name('login');
        Route::post('login', [AuthenticationController::class, 'loginPost']);
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticationController::class, 'logout'])->name('logout');
    });

    Route::middleware('auth')->group(function () {
        Route::get('account', [AccountController::class, 'account'])->name('account');

        Route::resource('orders', OrdersController::class)->only(['index', 'show']);
    });
});

Route::get('', function () {
    return response()->view('landing.welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'loginBasic'])->name('loginBasic');
    Route::post('login', [AuthenticationController::class, 'loginBasicPost']);
});

Route::post('logout', [AuthenticationController::class, 'logoutBasic'])->name('logoutBasic');

Route::middleware('auth')
    ->middleware(['hasOrganization'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('', [\App\Http\Controllers\Dashboard\HomeController::class, 'home'])->name('home');

        Route::resource('customers', CustomersController::class);
        Route::resource('orders', \App\Http\Controllers\Dashboard\OrdersController::class);
        Route::resource('reservation-types', ReservationTypesController::class);
        Route::resource('orderLines', OrderLinesController::class);
        Route::resource('frequently-asked-questions', FrequentlyAskedQuestionController::class);
    });
