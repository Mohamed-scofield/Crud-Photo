<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('Notes.index');
})->name('home');

Route::resource('Notes' ,StudentController::class);


