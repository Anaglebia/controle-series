<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\SeriesController;
use App\http\Controllers\SeasonsController;


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

Route::get('/', function () {
    return redirect('series');
});

// Route::controller(SeriesController::class)->group(function (){
//     Route::get('/series',  'index');
//     Route::get('/series/criar', 'create');
//     Route::post('/series/salvar', 'store');

// });
// Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');
// Route::put('/series/edit', [SeriesController::class, 'edit'])->name('series.edit');

// Route::resource('/series', SeriesController::class)->only(['index','create','store','destroy','edit','update']);

Route::resource('/series', SeriesController::class)->except(['show']);
Route::get('/series/{series}/seasons',[SeasonsController::class, 'index'])->name('seasons.index');

