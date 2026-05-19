<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class supplier extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT lOBOTOMY CORP',
                'phone' => '021-12345678',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat'
            ],
            [
                'name' => 'K CORP',
                'phone' => '022-87654321',
                'address' => 'Jl. Raya Bandung No. 45, Bandung'
            ],
            [
                'name' => 'T CORP',
                'phone' => '031-11223344',
                'address' => 'Jl. Pemuda No. 67, Surabaya'
            ],
            [
                'name' => 'W CORP',
                'phone' => '024-99887766',
                'address' => 'Jl. Pandanaran No. 89, Semarang'
            ],
            [
                'name' => 'U CORP',
                'phone' => '0274-556677',
                'address' => 'Jl. Malioboro No. 12, Yogyakarta'
            ]
        ]);
        
    }
}
