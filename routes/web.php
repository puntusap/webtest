<?php

use App\Http\Controllers\PasteController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Auth::routes();

Route::get('/', [App\Http\Controllers\PasteController::class, 'index'])->name('home');

Route::post('/',  [App\Http\Controllers\PasteController::class, 'submit'])->name('paste-form');

Route::post('/search',[App\Http\Controllers\PasteController::class, 'search'])->name('search');

Route::get('/mypastes',[App\Http\Controllers\PasteController::class, 'myPastes'])->name('my-pastes');

Route::get('/{hash}',
    [App\Http\Controllers\PasteController::class, 'showOnePaste'])->name('paste-data-one');



