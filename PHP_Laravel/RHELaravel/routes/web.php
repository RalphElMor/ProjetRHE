<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\CommandeController;

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

Route::get('/apropos', function () {
    return view('apropos');
}); 

Route:: get ('/', [PieceController::class, 'index']);
Route::post('/autocomplete', [PieceController::class,'autocomplete'])->name('autocomplete');
Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
//création des routes avec resources
Route::resources([
                // 'pieces'=> PieceController::class,
                 'commandes'=> CommandeController::class,
                ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PieceController::class)->group(function () {
    Route::get('/pieces/{id}', 'show');
});

Route:: get ('/admin/pieces', [PieceController::class, 'index'])->middleware('admin')->name('pieces.index'); 
Route:: get ('/admin/pieces/create', [PieceController::class, 'create'])->middleware('admin')->name('pieces.create');
Route:: post ('/admin/pieces/store', [PieceController::class, 'store'])->middleware('admin')->name('pieces.store'); 
Route:: get ('/admin/pieces/{id}', [PieceController::class, 'show'])->middleware('admin')->name('pieces.show'); 
Route:: get ('/admin/pieces/{id}/edit', [PieceController::class, 'edit'])->middleware('admin')->name('pieces.edit'); 
Route::patch('admin/pieces/{piece}', [PieceController::class, 'update'])->name('pieces.update');
Route:: delete ('/admin/pieces/{id}', [PieceController::class, 'destroy'])->middleware('admin')->name('pieces.destroy'); 
