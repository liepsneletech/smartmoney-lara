<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/accounts', [AccountController::class, 'showAccounts'])->name('show-accounts');

    Route::get('/create-account', [AccountController::class, 'createAccount'])->name('create-account');
    Route::post('/create-account', [AccountController::class, 'saveAccount'])->name('save-account');

    Route::get('/accounts/add/{account}', [AccountController::class, 'showAddMoney'])->name('show-add-money');
    Route::put('/accounts/add/{account}', [AccountController::class, 'addMoney'])->name('add-money');

    Route::get('/accounts/withdraw/{account}', [AccountController::class, 'showWithdrawMoney'])->name('show-withdraw-money');
    Route::put('/accounts/withdraw/{account}', [AccountController::class, 'withdrawMoney'])->name('withdraw-money');

    Route::delete('/accounts/delete/{account}', [AccountController::class, 'deleteAccount'])->name('delete-account');
});

Route::get('/', [AccountController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'showLogin'])->name('show-login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');