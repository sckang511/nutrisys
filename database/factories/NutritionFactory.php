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
$factory->define(App\Nutrition::class, function (Faker $faker) {
    $id = '5ab0b2008739ed2bf27a98';
    $string = 'steak';
    $random = rand(1, 5);
    switch($random) {
    case 1:
        $string = 'steak';
        break;
    case 2:
        $string = 'egg';
        break;
    case 3:
        $string = 'carrot';
        break;
    case 4:
        $string = 'beef';
        break;
    case 5:
        $string = 'pork';
        break;
    default:
        $string = 'cake';
        break;
    }
    return [
        'item_id' => $id,
        'item_name' => $string,
        'item_image' => 'https://queal.com/bootstrap-pages/images/diet.png',
        'serving_qty' => rand(1, 10),
        'serving_unit' => 'oz',
        'calorie' => rand(100, 1000),
        'protein' => rand(100, 1000),
        'carbohydrate' => rand(100, 1000),
    ];
});