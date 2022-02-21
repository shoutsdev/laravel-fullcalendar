<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('events',[\App\Http\Controllers\EventController::class,'index'])->name('events.index');
Route::post('events/store',[\App\Http\Controllers\EventController::class,'store'])->name('events.store');
Route::get('events/edit',[\App\Http\Controllers\EventController::class,'edit'])->name('events.edit');
Route::get('events/update',[\App\Http\Controllers\EventController::class,'update'])->name('events.update');
Route::get('events/destroy',[\App\Http\Controllers\EventController::class,'destroy'])->name('events.destroy');
