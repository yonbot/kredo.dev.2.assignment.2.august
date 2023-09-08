<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AccountController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/{user_id}/account', [AccountController::class, 'index'])->name('account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('/{user_id}/account/store', [AccountController::class, 'store'])->name('account.store');
    Route::get('/{user_id}/deposit/edit', [AccountController::class, 'depositEdit'])->name('deposit.edit');
    Route::patch('/deposit/update', [AccountController::class, 'depositUpdate'])->name('deposit.update');
    Route::get('/{user_id}/withdraw/edit', [AccountController::class, 'withdrawEdit'])->name('withdraw.edit');
    Route::patch('/withdraw/update', [AccountController::class, 'withdrawUpdate'])->name('withdraw.update');
});
