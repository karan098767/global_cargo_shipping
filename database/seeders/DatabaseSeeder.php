<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: keep your test user
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call all other seeders
       $this->call([
    \Database\Seeders\PortsSeeder::class,   // ports first
    \Database\Seeders\ShipsSeeder::class,   // ships second
    \Database\Seeders\ClientsSeeder::class, // clients third
    \Database\Seeders\CrewSeeder::class,    // crew fourth
    \Database\Seeders\CargoSeeder::class,   // cargo fifth
    \Database\Seeders\ShipmentsSeeder::class, // shipments last
]);

    }
}
