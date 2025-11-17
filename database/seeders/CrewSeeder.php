<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crew;
use App\Models\Ship; // make sure to import Ship

class CrewSeeder extends Seeder
{
    public function run(): void
    {
        // Get an existing ship from the database
        $ship = Ship::first(); 

        // Define crew members using the existing ship ID
        $crewMembers = [
            [
                'ship_id' => $ship->id,
                'first_name' => 'Peter',
                'last_name' => 'Parker',
                'role' => 'Captain',
                'phone_number' => '+254700000005',
                'nationality' => 'USA',
                'is_active' => true,
            ],
            [
                'ship_id' => $ship->id,
                'first_name' => 'Bruce',
                'last_name' => 'Wayne',
                'role' => 'Chief Officer',
                'phone_number' => '+254700000006',
                'nationality' => 'USA',
                'is_active' => true,
            ],
        ];

        // Insert crew members if they don’t exist
        foreach ($crewMembers as $crew) {
            Crew::firstOrCreate(
                ['phone_number' => $crew['phone_number']],
                $crew
            );
        }
    }
}
