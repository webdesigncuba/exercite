<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PersonController;
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
    return view('index');
});

Route::prefix('person')->group(function(){
    Route::get('/',[ PersonController::class, 'index'])->name('person.index');
    Route::get('/create',[PersonController::class,'create']);
    Route::post('/create',[PersonController::class,'store'])->name('person.save');
    Route::get('/{id}/edit',[PersonController::class,'edit'])->name('person.edit');
    Route::put('/update/{id}',[PersonController::class,'update'])->name('person.update');
    Route::get('/detail/{id}',[PersonController::class,'show'])->name('person.detail');
    Route::get('/delete/{id}',[PersonController::class,'destroy'])->name('person.delete');
});

Route::prefix('contact')->group(function(){
    Route::get('/',[ ContactController::class, 'index'])->name('contact.index');
    Route::get('/create',[ContactController::class,'create']);
    Route::post('/create',[ContactController::class,'store'])->name('contact.save');
    Route::get('/{id}/edit',[ContactController::class,'edit'])->name('contact.edit');
    Route::put('/update/{id}',[ContactController::class,'update'])->name('contact.update');
    Route::get('/delete/{id}',[ContactController::class,'destroy'])->name('contact.delete');
});
