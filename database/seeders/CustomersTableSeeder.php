<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('customers')->insert([
                'name' => 'Customer ' . $i,
                'email' => 'customer.' . $i . '@example.com',
                'phone' => '012345678' . $i,
                'password' => bcrypt('12345678'),
                'address' => 'Address ' . $i,
                'created_at' => now(),
                'updated_at' => null,
            ]);
        }
    }
}
