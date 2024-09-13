<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 5) as $index) {
            DB::table('suppliers')->insert([
                'name' => 'Supplier ' . $index,
                'contact_information' => 'Contact Info ' . $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
