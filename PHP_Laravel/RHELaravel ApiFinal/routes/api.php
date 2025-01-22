<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PieceController;
use App\Http\Controllers\Api\RegisterController;

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

Route::get('/pieces/autocomplete', [PieceController::class, 'autocomplete'])->withoutMiddleware('auth:sanctum');
Route::apiResource('/pieces', PieceController::class);  //cette route générée par resources fonctionne aussi

Route::post('login', [RegisterController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [RegisterController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/pieces', [PieceController::class, 'index']);
Route::get('/pieces/{id}', [PieceController::class, 'show']);
     
//Route::resource('pieces', PieceController::class);
Route::middleware('auth:sanctum')->group( function () {
    //Route::resource('pieces', PieceController::class);
    // Route::get('pieces', [PieceController::class, 'index']);
    Route::post('pieces/', [PieceController::class, 'store']);
    Route::get('pieces/edit/{id}', [PieceController::class, 'edit']);
    Route::put('pieces/update/{id}', [PieceController::class, 'update']);
    Route::delete('pieces/{id}', [PieceController::class, 'destroy']); 

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});