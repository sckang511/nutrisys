#!/bin/bash

# clean database
php artisan migrate:fresh

# get into tinker
php artisan tinker

# create a test user
# username=tester
# password=123123
App\User::create(['user_id'=>100,'first_name'=>'Tester','last_name'=>'Testing','email'=>'test@test.test','username'=>'tester','password'=>'123123']);

# create a goal for that user
App\Goal::create(['user_id'=>100,'goal_type'=>'Daily','nutrition_type'=>'Calories', 'value'=>'2000']);

# create consumable collections
App\Consumable_Collection::create(['consumable_collection_id'=>100,'user_id'=>100,'consumable_type'=>'Breakfast']);
App\Consumable_Collection::create(['consumable_collection_id'=>101,'user_id'=>100,'consumable_type'=>'Lunch']);
App\Consumable_Collection::create(['consumable_collection_id'=>102,'user_id'=>100,'consumable_type'=>'Dinner']);
App\Consumable_Collection::create(['consumable_collection_id'=>103,'user_id'=>100,'consumable_type'=>'Other']);
App\Consumable_Collection::create(['consumable_collection_id'=>104,'user_id'=>100,'consumable_type'=>'Snack']);

# create consumable items
App\Consumable_Item::create(['consumable_item_id'=>100,'consumable_collection_id'=>100, 'nutrition_id'=>'1']);
App\Consumable_Item::create(['consumable_item_id'=>101,'consumable_collection_id'=>101, 'nutrition_id'=>'2']);
App\Consumable_Item::create(['consumable_item_id'=>102,'consumable_collection_id'=>102, 'nutrition_id'=>'3']);
App\Consumable_Item::create(['consumable_item_id'=>103,'consumable_collection_id'=>103, 'nutrition_id'=>'2']);
App\Consumable_Item::create(['consumable_item_id'=>104,'consumable_collection_id'=>104, 'nutrition_id'=>'3']);
App\Consumable_Item::create(['consumable_item_id'=>105,'consumable_collection_id'=>100, 'nutrition_id'=>'1']);

App\Nutrition::create(['item_id'=>'5ab0b2008739d9ed2bf27a98', 'item_name'=>'some_item1', 'serving_qty'=>7.5, 'serving_unit'=>"oz", 'calorie'=>200, 'total_fat'=>20, 'saturated_fat'=>9.5, 'cholesterol'=>2.5, 'sodium'=>12, 'carbohydrate'=>150, 'dietary_fiber'=>0.5, 'sugar'=>20.5, 'protein'=>62.5, 'potassium'=>50.5]);
App\Nutrition::create(['item_id'=>'5796d978b6d0d1c454988b57', 'item_name'=>'some_item2', 'serving_qty'=>5.5, 'serving_unit'=>"oz", 'calorie'=>500, 'total_fat'=>10, 'saturated_fat'=>2.5, 'cholesterol'=>0.5, 'sodium'=>52, 'carbohydrate'=>250, 'dietary_fiber'=>2.5, 'sugar'=>10.5, 'protein'=>82.5, 'potassium'=>20.5]);
App\Nutrition::create(['item_id'=>'54f67b454b70c0c8314bc0bf', 'item_name'=>'some_item3', 'serving_qty'=>3.5, 'serving_unit'=>"oz", 'calorie'=>700, 'total_fat'=>51, 'saturated_fat'=>6.5, 'cholesterol'=>2.2, 'sodium'=>72, 'carbohydrate'=>550, 'dietary_fiber'=>45.5, 'sugar'=>70.5, 'protein'=>122.5, 'potassium'=>10.5]);