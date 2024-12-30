<?php

use App\Http\Controllers\FamilyTreeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('family',FamilyTreeController::class);
