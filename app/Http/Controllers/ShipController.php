<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function index()
    {
        $ships = Ship::all();
        return view('ships.index', compact('ships'));
    }

    // other CRUD methods here...
}
