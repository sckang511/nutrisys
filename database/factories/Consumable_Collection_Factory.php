<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Consumable_Collection::class, function (Faker $faker) {

    $user_pool = sizeof(App\User::all()) - 1;
    $string = 'Breakfast';
    $random = rand(1, 5);
    switch($random) {
    case 1:
        $string = 'Breakfast';
        break;
    case 2:
        $string = 'Lunch';
        break;
    case 3:
        $string = 'Dinner';
        break;
    case 4:
        $string = 'Other';
        break;
    case 5:
        $string = 'Snack';
        break;
    default:
        $string = 'Breakfast';
        break;
    }

    return [
        'user_id' => rand(1, $user_pool),
        'date' => now(),
        'consumable_type' => $string,
    ];
});
