<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('items', [TodoController::class, 'index']);
Route::group(['prefix' => 'item'], function () {
    Route::post('add', [TodoController::class, 'add']);
    Route::get('edit/{id}', [TodoController::class, 'edit']);
    Route::post('update/{id}', [TodoController::class, 'update']);
    Route::delete('delete/{id}', [TodoController::class, 'delete']);

});