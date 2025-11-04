<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PortController;



// Redirect homepage to shipments
Route::get('/', function () {
    return redirect('/shipments');
});

// Resource route for shipments
Route::resource('shipments', ShipmentController::class);
Route::get('/ships/create',[ShipController::class, 'create'])->name('ships.create');
Route::post('/ships/create',[ShipController::class, 'store'])->name('ships.store');
Route::resource('crew', CrewController::class);
Route::resource('cargos', CargoController::class);
Route::resource('clients',ClientController::class);
Route::resource('ports', PortController::class);
            