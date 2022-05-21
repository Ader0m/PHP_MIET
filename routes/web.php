<?php

use App\Http\Controllers\AdressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoyerController;

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
    return view('welcome');
});

Route::get('/customers', [BoyerController::class, 'data'])->name('boyer');
Route::get('/customers/{id}', [BoyerController::class, 'dataCustomer'])->name('dataCustomer');
