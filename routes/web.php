<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\HomeController;
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
    return view('Home')->with('filterValue', 5);
});
Route::get('/home/{filterValue}', [HomeController::class, 'index']);
Route::get('/Domain', [DomainController::class,'index']);
Route::get('/Domain/{slug}',[DomainController::class,'index']);
