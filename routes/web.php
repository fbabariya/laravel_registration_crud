<?php

use App\Http\Controllers\CountrylistController;
use App\Http\Controllers\apiCrudController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;


Route::resource('crud',CrudController::class);
