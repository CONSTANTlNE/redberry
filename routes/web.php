<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\RealEstatesController;
use App\Http\Controllers\RegionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Agents Routes
route::get('/agents',[AgentsController::class,'index'])->name('agents.index');
route::post('/agents/create',[AgentsController::class,'create'])->name('agents.create');


// Real Estate Routes
route::get('real-estates',[RealEstatesController::class,'index'])->name('real-estates.index');
route::get('create/real-estates',[RealEstatesController::class,'create'])->name('real-estates.create');
route::post('real-estates/store',[RealEstatesController::class,'store'])->name('real-estates.store');
route::get('real-estates/{id}',[RealEstatesController::class,'show'])->name('real-estates.show');
route::delete('real-estates/{id}',[RealEstatesController::class,'delete'])->name('real-estates.delete');


// Geographical information Routes
route::get('cities',[CitiesController::class,'index'])->name('cities.index');
route::get('regions',[RegionsController::class,'index'])->name('regions.index');

// Htmx
route::get('htmx/cities',[CitiesController::class,'cities'])->name('htmx.cities');