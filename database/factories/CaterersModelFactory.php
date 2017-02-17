<?php 

$factory->define(App\Entities\Caterer::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name, 
        'phone' => $faker->randomNumber($nbDigits = NULL), 
        'address' => $faker->streetName, 
        'number' => $faker->buildingNumber, 
        'district' => $faker->citySuffix, 
        'city' => $faker->city, 
        'state' => $faker->state     
    ];
});



 