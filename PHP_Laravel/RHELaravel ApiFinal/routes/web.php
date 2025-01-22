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
    return view('apropos')->with('message', 'page à propos pour le test');
}); 
  
  Route::get('{any}', function () {
    return view('monopage');
})->where('any', '.*'); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('index');
//Route::post('/autocomplete', [PieceController::class,'autocomplete'])->name('autocomplete');
Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

Route::controller(PieceController::class)->group(function () {
    Route::get('/pieces/{id}', 'show');
});
//création des routes avec resources
Route::resources([
  // 'pieces'=> PieceController::class,
    'commandes'=> CommandeController::class,
   ]);
 
Auth::routes();

Route:: get ('/admin/pieces', [PieceController::class, 'index'])->middleware('admin')->name('pieces.index'); 
Route:: get ('/admin/pieces/add', [PieceController::class, 'add'])->middleware('admin')->name('pieces.add');
Route:: post ('/admin/pieces/store', [PieceController::class, 'store'])->middleware('admin')->name('pieces.store'); 
Route:: get ('/admin/pieces/{id}', [PieceController::class, 'show'])->middleware('admin')->name('pieces.show'); 
Route:: get ('/admin/pieces/{id}/edit', [PieceController::class, 'edit'])->middleware('admin')->name('pieces.edit'); 
Route::patch('admin/pieces/{piece}', [PieceController::class, 'update'])->name('pieces.update');
Route:: delete ('/admin/pieces/{id}', [PieceController::class, 'destroy'])->middleware('admin')->name('pieces.destroy'); 
