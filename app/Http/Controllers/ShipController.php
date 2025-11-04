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
  public function create()
    {


        return view('ships.create' ) ; 
     }
     public function store(Request $request){
        $data=$request->validate([
       'name' => 'required|string|min:3',
       'registration_number' => 'required|string|min:3',
       'capacity_in_tonnes' => 'required|decimal:2',
       'type' => 'required|string|min:3',
       'status' => 'required|string|min:3',

        ]);

        Ship::create($data);
        return redirect()->route('shipments.index');
}

    // other CRUD methods here...
}
