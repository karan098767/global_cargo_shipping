<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email_address' => 'john@example.com',
                'phone_number' => '+254700000001',
                'address' => 'Nairobi, Kenya',
                'is_active' => true,
            ],
            [
                'first_name' => 'Mary',
                'last_name' => 'Jane',
                'email_address' => 'mary@example.com',
                'phone_number' => '+254700000002',
                'address' => 'Mombasa, Kenya',
                'is_active' => true,
            ],
        ];

        foreach ($clients as $client) {
            Client::firstOrCreate(
                ['email_address' => $client['email_address']],
                $client
            );
        }
    }
}
