<?php

use Illuminate\Database\Seeder;
use App\Freight;

class FreightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Freight::truncate();
        factory(Freight::class, 10)->create();
    }
}
