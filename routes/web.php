<?php

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

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ListigController::class, 'index']);
Route::get('/listings/create', [App\Http\Controllers\ListigController::class, 'create'])->middleware('auth');
Route::get('/listings/manage', [App\Http\Controllers\ListigController::class, 'manage'])->middleware('auth');
Route::get('/listings/edit/{id}', [App\Http\Controllers\ListigController::class, 'edit'])->middleware('auth');
Route::post('/listings', [App\Http\Controllers\ListigController::class, 'store'])->middleware('auth');
Route::put('/listings/{listig}', [App\Http\Controllers\ListigController::class, 'update'])->middleware('auth');
Route::delete('/listings/{listig}', [App\Http\Controllers\ListigController::class, 'delete'])->middleware('auth');
Route::get('/listings/show/{id}', [App\Http\Controllers\ListigController::class, 'show']);


