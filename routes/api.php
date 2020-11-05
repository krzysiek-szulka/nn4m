<?php declare(strict_types=1);

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

use Illuminate\Support\Facades\Route;

Route::get('/stores', [\App\Http\Controllers\Api\StoreController::class, 'listStores']);
Route::get('/stores/{storeId}', [\App\Http\Controllers\Api\StoreController::class, 'get']);

Route::get('/errors', [\App\Http\Controllers\Api\ErrorController::class, 'listErrors']);
Route::get('/errors/{storeId}', [\App\Http\Controllers\Api\ErrorController::class, 'getByStoreId']);


