<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoSeeder extends Seeder
{
    public function run(): void
    {
        $cargos = [
            ['Electronics', 'TRK1001', 250.50, 'Mombasa', 'Dubai', 'Pending', true],
            ['Furniture', 'TRK1002', 500.00, 'Nairobi', 'Lagos', 'In Transit', true],
            ['Clothing', 'TRK1003', 150.75, 'Mombasa', 'London', 'Delivered', true],
            ['Automobile Parts', 'TRK1004', 1200.00, 'Dar es Salaam', 'Dubai', 'Pending', true],
            ['Food Supplies', 'TRK1005', 800.50, 'Mombasa', 'New York', 'In Transit', true],
            ['Medicines', 'TRK1006', 100.00, 'Nairobi', 'Cairo', 'Delivered', true],
            ['Books', 'TRK1007', 50.50, 'Mombasa', 'Paris', 'Pending', true],
            ['Machinery', 'TRK1008', 2000.00, 'Dar es Salaam', 'Rotterdam', 'In Transit', true],
            ['Textiles', 'TRK1009', 300.75, 'Nairobi', 'Dubai', 'Delivered', true],
            ['Chemicals', 'TRK1010', 600.00, 'Mombasa', 'Hamburg', 'Pending', true],
        ];

        foreach ($cargos as $cargo) {
            Cargo::create([
                'cargo_name' => $cargo[0],
                'tracking_number' => $cargo[1],
                'weight' => $cargo[2],
                'origin_port' => $cargo[3],
                'destination_port' => $cargo[4],
                'status' => $cargo[5],
                'is_active' => $cargo[6],
            ]);
        }
    }
}
