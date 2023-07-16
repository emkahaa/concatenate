<?php

use App\Http\Controllers\CekOngkirController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cek_ongkir')->name('cekOngkir.')->group(function(){
    Route::get('/', [CekOngkirController::class, 'index'])->name('index');
    Route::post('/hasil', [CekOngkirController::class, 'hasil'])->name('hasil');
});