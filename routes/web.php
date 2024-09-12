<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Vtex\InvoiceController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index']);

Route::prefix('vtex/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']); // List all orders
    Route::post('/', [OrderController::class, 'store']); // Create a new order (if applicable)
    Route::get('/{orderId}', [OrderController::class, 'show']); // Show specific order
    Route::put('/{orderId}', [OrderController::class, 'update']); // Update order
    Route::delete('/{orderId}', [OrderController::class, 'destroy']); // Delete order
    Route::get('/{orderId}/invoices', [OrderController::class, 'getInvoices']); // Get invoices for order
    Route::get('/{orderId}/payments', [OrderController::class, 'getPayments']); // Get payments for order
});

// Routes for Invoices
Route::prefix('vtex/orders/{orderId}/invoices')->group(function () {
    Route::get('/', [InvoiceController::class, 'index']);  // List all invoices for the order
    Route::post('/', [InvoiceController::class, 'store']); // Create a new invoice for the order
});

// Routes for Payments
Route::prefix('vtex/orders/{orderId}/payments')->group(function () {
    Route::get('/', [PaymentController::class, 'index']);  // List all payments for the order
});

Route::prefix('vtex/payments/{paymentId}')->group(function () {
    Route::post('/refund', [PaymentController::class, 'refund']); // Refund the payment
    Route::post('/cancel', [PaymentController::class, 'cancel']); // Cancel the payment
});

