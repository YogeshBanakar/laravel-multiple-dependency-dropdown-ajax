<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[PlaceController::class,'index'])->name('place.index');
Route::get('getCountry',[PlaceController::class,'getCountry'])->name('getCountry');
Route::get('getCity',[PlaceController::class,'getCity'])->name('getCity');
