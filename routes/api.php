<?php

use App\Http\Api\Modules\Controllers\AnimalsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('animals')->group(function () {
    Route::get('', [AnimalsController::class, 'getAnimals']);
    Route::post('', [AnimalsController::class, 'createAnimal']);
    Route::prefix('{id}')->group(function () {
        Route::patch('', [AnimalsController::class, 'updateAnimal']);
        Route::delete('', [AnimalsController::class, 'deleteAnimal']);
    });
    Route::get('types', [AnimalsController::class, 'getTypes']);
});

