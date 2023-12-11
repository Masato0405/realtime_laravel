<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['product_name' => '肉', 'stock_quantity' => 100, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_name' => '魚', 'stock_quantity' => 50, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_name' => '店長', 'stock_quantity' => 75, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}