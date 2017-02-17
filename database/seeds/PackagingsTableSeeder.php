<?php

use Illuminate\Database\Seeder;
use App\Entities\Packaging;

class PackagingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Packaging::class, 10)->create();
    }
}
