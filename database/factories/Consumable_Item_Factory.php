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

$factory->define(App\Consumable_Item::class, function (Faker $faker) {

    $collection_pool = sizeof(App\Consumable_Collection::all()) - 1;
    $nutrition_pool = sizeof(App\Nutrition::all()) -1;

    return [
        'consumable_collection_id' => rand(1, $collection_pool),
        'nutrition_id' => rand(1, $nutrition_pool),
    ];
});
