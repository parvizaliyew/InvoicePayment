<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[InvoiceController::class,'invoice_payment']);

Route::post('/invoice-post',[InvoiceController::class,'invoice_post'])->name('invoice_post');

Route::get('/card-payment',[InvoiceController::class,'card_payment'])->name('card_payment');

Route::post('/card-payment-post',[InvoiceController::class,'payment_post'])->name('payment_post');
