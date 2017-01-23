<?php 

$factory->define(App\Packaging::class, function (Faker\Generator $faker) {

    return [
        'provider' => $faker->text($maxNbChars = 200),
        'amount' => $faker->randomDigit,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
    ];
});



 