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
    $count = rand(1, 6);
    $string = 'calorie';
    $string2 = 'Daily';
    switch($count) {
        case 1:
            $string = 'Potassium';
            $string2 = 'Daily';
            break;
        case 2: 
            $string = 'Sugar';
            $string2 = 'Weekly';
            break;
        case 3:
            $string = 'Protein';
            $string2 = 'Daily';
            break;
        case 4:
            $string = 'Iron';
            $string2 = 'Weekly';
            break;
        case 5:
            $string = 'Cholesterol';
            $string2 = 'Weekly';
            break;
        case 6:
            $string = 'Calorie';
            $string2 = 'Daily';
            break;
        default:
            $string = 'Sodium';
            $string2 = 'Daily';
            break;
    }   
    return [
        'user_id' => rand(1, $user_pool),
        'goal_type' => $string2,
        'nutrition_type' => $string,
        'value' => rand(100, 1000),
    ];
});
