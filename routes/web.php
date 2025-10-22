<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;

// Redirect homepage to shipments
Route::get('/', function () {
    return redirect('/shipments');
});

// Resource route for shipments
Route::resource('shipments', ShipmentController::class);
