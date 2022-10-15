<?php

use App\Http\Controllers\API\V1\TransactionController;
use App\Http\Controllers\OrderController;
use App\Transaction;
use Illuminate\Support\Facades\Route;
use App\Services\Midtrans\CreateSnapTokenService;

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

Route::get('donations', [OrderController::class, 'donation']);
Route::get('donations/{donation}', [OrderController::class, 'detail_donation'])->name('donation');

Route::get('donations/form/{donation}', [OrderController::class, 'form_donation'])->name('donation.form');
Route::get('transactions', [OrderController::class, 'index']);
Route::post('transactions/{donation}', [OrderController::class, 'store_transaction'])->name('transaction.store');
Route::get('transactions/{transaction}', [OrderController::class, 'proccess_transaction'])->name('transaction.process');
