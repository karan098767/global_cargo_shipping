<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ship;

class ShipsSeeder extends Seeder
{
    public function run(): void
    {
        $ships = [
            [
                'name' => 'Ocean King',
                'registration_number' => 'SHIP001',
                'capacity_in_tonnes' => 1000,
                'type' => 'cargo ship',
                'status' => 'active',
                'is_active' => true,
            ],
        ];

        foreach ($ships as $ship) {
            Ship::firstOrCreate(
                ['registration_number' => $ship['registration_number']],
                $ship
            );
        }
    }
}
