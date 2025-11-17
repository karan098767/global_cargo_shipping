<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Port;

class PortsSeeder extends Seeder
{
    public function run(): void
    {
        $ports = [
            [
                'name' => 'Mombasa',
                'country' => 'Kenya',
                'port_type' => 'Seaport',
                'coordinates' => '-4.0435,39.6682',
                'depth' => 15.5,
                'docking_capacity' => 10,
                'max_vessel_size' => 30000,
                'security_level' => 'High',
                'customs_authorized' => true,
                'operational_hours' => '24/7',
                'port_manager' => 'James Mwangi',
                'port_contact_info' => '+254700000111',
                'is_active' => true,
            ],
            [
                'name' => 'Dubai',
                'country' => 'UAE',
                'port_type' => 'Seaport',
                'coordinates' => '25.0657,55.1713',
                'depth' => 18.0,
                'docking_capacity' => 15,
                'max_vessel_size' => 40000,
                'security_level' => 'High',
                'customs_authorized' => true,
                'operational_hours' => '24/7',
                'port_manager' => 'Ahmed Al-Mansoori',
                'port_contact_info' => '+971500001111',
                'is_active' => true,
            ],
            [
                'name' => 'Lagos',
                'country' => 'Nigeria',
                'port_type' => 'Seaport',
                'coordinates' => '6.4531,3.3958',
                'depth' => 14.5,
                'docking_capacity' => 12,
                'max_vessel_size' => 35000,
                'security_level' => 'Medium',
                'customs_authorized' => true,
                'operational_hours' => '24/7',
                'port_manager' => 'Chike Obi',
                'port_contact_info' => '+234700001111',
                'is_active' => true,
            ],
        ];

        foreach ($ports as $port) {
            Port::create($port);
        }
    }
}
