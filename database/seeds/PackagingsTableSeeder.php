<?php

use Illuminate\Database\Seeder;
use App\Packaging;

class PackagingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Packaging::truncate();
        factory(Packaging::class, 10)->create();
    }
}
