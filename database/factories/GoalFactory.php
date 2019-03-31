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

$factory->define(App\Goal::class, function (Faker $faker) {

    $user_pool = sizeof(App\User::all()) - 1;
    $count = rand(1, 3);
    $string = 'calorie';
    $string2 = 'Daily';
    switch($count) {
        case 1:
            $string = 'calorie';
            break;
        case 2: 
            $string = 'sugar';
            $string2 = 'Weekly';
            break;
        case 3:
            $string = 'protein';
            $string2 = 'Weekly';
            break;
        default:
            $string = 'sodium';
            break;
    }   


    return [
        'user_id' => rand(1, $user_pool),
        'goal_type' => $string2,
        'nutrition_type' => $string,
        'value' => rand(100, 3000),
    ];
});
