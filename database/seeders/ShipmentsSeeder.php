<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;

class ShipmentsSeeder extends Seeder
{
    public function run(): void
    {
        $shipments = [
            [
                'cargo_id' => 1,
                'ship_id' => 1,
                'origin_port_id' => 1,
                'destination_port_id' => 1,
                'departure_date' => now()->toDateString(),
                'arrival_estimate' => now()->addDays(5)->toDateString(),
                'actual_arrival_date' => null,
                'status' => 'pending',
                'is_active' => true,
            ],
        ];

        foreach ($shipments as $shipment) {
            Shipment::firstOrCreate(
                ['cargo_id' => $shipment['cargo_id'], 'ship_id' => $shipment['ship_id']],
                $shipment
            );
        }
    }
}
