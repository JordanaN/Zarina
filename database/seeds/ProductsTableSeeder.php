<?php

use Illuminate\Database\Seeder;
use App\Entities\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        factory(Product::class, 50)->create();
    }
}
