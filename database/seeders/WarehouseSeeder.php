<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 3) as $index) {
            DB::table('warehouses')->insert([
                'name' => 'Warehouse ' . $index,
                'location' => 'Location ' . $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
