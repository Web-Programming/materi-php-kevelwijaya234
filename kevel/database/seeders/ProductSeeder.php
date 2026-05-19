<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('products')->insert([
        //    'name' => Str::random(10),
        //    'price' => 100,
        //    'description' => Str::random(10),
        //    'status' => ['new', 'used'][rand(0, 1)],
        //    'is_active' => true,
        //    'release_date' => now()->subDays(rand(1, 365))
        // ]);
        Product::factory(45)->create();
    }
}
