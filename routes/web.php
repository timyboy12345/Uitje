<?php

use App\Http\Controllers\Marketing\AuthenticationController;
use App\Http\Controllers\Shop\AccountController;
use App\Http\Controllers\Dashboard\CustomersController;
use App\Http\Controllers\Dashboard\FrequentlyAskedQuestionController;
use App\Http\Controllers\Dashboard\OrderLinesController;
use App\Http\Controllers\Dashboard\ReservationTypeLinesController;
use App\Http\Controllers\Dashboard\ReservationTypesController;
use App\Http\Controllers\Shop\ExtraReservationController;
use App\Http\Controllers\Shop\HomeController;
use App\Http\Controllers\Shop\OrdersController;
use App\Http\Controllers\Shop\ReservationController;
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
        Route::get('login', [\App\Http\Controllers\Shop\AuthenticationController::class, 'login'])->name('login');
        Route::post('login', [\App\Http\Controllers\Shop\AuthenticationController::class, 'loginPost']);
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [\App\Http\Controllers\Shop\AuthenticationController::class, 'logout'])->name('logout');
    });

    Route::middleware('auth')->group(function () {
        Route::get('account', [AccountController::class, 'account'])->name('account');

        Route::resource('orders', OrdersController::class)->only(['index', 'show']);
    });
});

Route::get('', function () {
    return response()->view('marketing.welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticationController::class, 'login'])->name('loginBasic');
    Route::post('login', [AuthenticationController::class, 'loginPost']);
});

Route::post('logout', [AuthenticationController::class, 'logout'])->name('logoutBasic');

Route::middleware(['hasOrganization', 'auth'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('', [\App\Http\Controllers\Dashboard\HomeController::class, 'home'])->name('home');

        Route::resource('customers', CustomersController::class);
        Route::resource('orders', \App\Http\Controllers\Dashboard\OrdersController::class);
        Route::resource('reservation-types', ReservationTypesController::class);
        Route::post('reservation-types/{id}/upload', [ReservationTypesController::class, 'postFile'])->name('reservation-types.upload');

        Route::resource('orderLines', OrderLinesController::class);
        Route::resource('frequently-asked-questions', FrequentlyAskedQuestionController::class);
        Route::resource('reservation-type-lines', ReservationTypeLinesController::class);
    });
