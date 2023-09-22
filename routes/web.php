<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MovieController;


Route::controller(MovieController::class)->group(function() {
    Route::get('/', 'index')->name('movie.index');
});