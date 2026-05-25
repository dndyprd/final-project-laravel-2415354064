<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $subscriptions = [
            // Budi Santoso → Shared Hosting Basic (active)
            [
                'customer_id' => 1,
                'service_id'  => 1,
                'start_date'  => '2024-01-01',
                'end_date'    => '2025-01-01',
                'status'      => 'active',
            ],
            // Budi Santoso → Domain .COM (active)
            [
                'customer_id' => 1,
                'service_id'  => 5,
                'start_date'  => '2024-01-01',
                'end_date'    => '2025-01-01',
                'status'      => 'active',
            ],
            // Siti Rahayu → VPS Starter (active)
            [
                'customer_id' => 2,
                'service_id'  => 3,
                'start_date'  => '2024-03-15',
                'end_date'    => '2025-03-15',
                'status'      => 'active',
            ],
            // Siti Rahayu → SSL Certificate Standard (active)
            [
                'customer_id' => 2,
                'service_id'  => 8,
                'start_date'  => '2024-03-15',
                'end_date'    => '2025-03-15',
                'status'      => 'active',
            ],
            // Ahmad Fauzi → VPS Business (trial)
            [
                'customer_id' => 3,
                'service_id'  => 4,
                'start_date'  => '2025-01-10',
                'end_date'    => '2025-02-10',
                'status'      => 'trial',
            ],
            // Dewi Lestari → Email Hosting Business (active)
            [
                'customer_id' => 4,
                'service_id'  => 7,
                'start_date'  => '2024-06-01',
                'end_date'    => '2025-06-01',
                'status'      => 'active',
            ],
            // Dewi Lestari → Domain .ID (active)
            [
                'customer_id' => 4,
                'service_id'  => 6,
                'start_date'  => '2024-06-01',
                'end_date'    => '2025-06-01',
                'status'      => 'active',
            ],
            // Rizky Pratama → Shared Hosting Pro (isolir)
            [
                'customer_id' => 5,
                'service_id'  => 2,
                'start_date'  => '2023-08-01',
                'end_date'    => '2024-08-01',
                'status'      => 'isolir',
            ],
            // Rina Marlina → SSL Premium Wildcard (active)
            [
                'customer_id' => 6,
                'service_id'  => 9,
                'start_date'  => '2024-09-01',
                'end_date'    => '2025-09-01',
                'status'      => 'active',
            ],
            // Hendra Gunawan → VPS Starter (inactive)
            [
                'customer_id' => 7,
                'service_id'  => 3,
                'start_date'  => '2023-05-01',
                'end_date'    => '2024-05-01',
                'status'      => 'inactive',
            ],
            // Nurul Hidayah → Shared Hosting Basic (dismantle)
            [
                'customer_id' => 8,
                'service_id'  => 1,
                'start_date'  => '2022-01-01',
                'end_date'    => '2023-01-01',
                'status'      => 'dismantle',
            ],
            // Farhan Maulana → Domain .COM (trial)
            [
                'customer_id' => 9,
                'service_id'  => 5,
                'start_date'  => '2025-01-20',
                'end_date'    => '2025-02-20',
                'status'      => 'trial',
            ],
            // Farhan Maulana → Email Hosting Business (active)
            [
                'customer_id' => 9,
                'service_id'  => 7,
                'start_date'  => '2024-11-01',
                'end_date'    => '2025-11-01',
                'status'      => 'active',
            ],
        ];

        DB::table('subscriptions')->insert($subscriptions);
    }
}