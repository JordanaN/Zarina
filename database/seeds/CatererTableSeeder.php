<?php

use Illuminate\Database\Seeder;
use App\Entities\Caterer;

class CatererTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Caterer::class, 10)->create();
    }
}
