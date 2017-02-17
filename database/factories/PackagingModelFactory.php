<?php 

$factory->define(App\Entities\Packaging::class, function (Faker\Generator $faker) {

    return [
        'amount' => $faker->randomDigit,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
    ];
});



 