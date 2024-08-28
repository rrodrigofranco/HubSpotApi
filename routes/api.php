<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HubSpot\TicketController;
use App\Http\Controllers\HubSpot\DealController;
use App\Http\Controllers\HubSpot\ContactController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('hubspot')->group(function () {
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('deals', DealController::class);
    Route::apiResource('contacts', ContactController::class);
});
