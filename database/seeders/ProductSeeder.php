<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Chicken Steak BBQ Sauce', 'price' => 50.00],
            ['name' => 'Chicken Steak Mushroom Sauce', 'price' => 55.00],
            ['name' => 'Chicken Steak Blackpepper Sauce', 'price' => 60.00],
            ['name' => 'Kentang Goreng', 'price' => 20.00],
            ['name' => 'Cola', 'price' => 10.00],
            ['name' => 'Air Mineral', 'price' => 5.00],
        ]);
        $this->call(ProductSeeder::class);
    }
}
