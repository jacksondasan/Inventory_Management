<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Ensure that you have suppliers in the database before seeding products
        $suppliers = DB::table('suppliers')->pluck('id');

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'name' => 'Product ' . $index,
                'sku' => 'SKU-' . Str::upper(Str::random(8)),
                'quantity_in_stock' => rand(1, 100),
                'supplier_id' => $suppliers->random(), // Randomly assign a supplier
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
