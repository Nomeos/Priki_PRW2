<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ReferenceController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/domains/{id}', [DomainController::class, 'index']);

Route::get('/practices',[PracticeController::class, 'index']);
Route::get('/practices/mod',[PracticeController::class, 'indexMod'])->middleware('auth');
Route::get('/practices/{id}',[PracticeController::class, 'show']);

Route::get('/opinions/{id}',[OpinionController::class, 'show']);
Route::post('/opinions/{id}',[OpinionController::class, 'store']);

Route::resource('references', ReferenceController::class);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

