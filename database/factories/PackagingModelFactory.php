<?php 

$factory->define(App\Entities\Packaging::class, function (Faker\Generator $faker) {

    return [
    	'name' => $faker->name,
        'amount' => $faker->randomDigit,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
    ];
});



 