<?php 


$factory->define(App\Product::class, function(Faker\Generator $faker) {
	return [
		'description' => $faker->text($maxNbChars = 200),
		'amount' => $faker->randomDigit,
		'cost_price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
		'code' => $faker->ean8,
	];
});

 