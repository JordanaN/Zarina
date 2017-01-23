<?php 


$factory->define(App\Freight::class, function(Faker\Generator $faker) {
	return [
		'description' => $faker->text($maxNbChars = 200),
		'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
	];
});