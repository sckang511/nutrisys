#!/bin/bash

# clean database
php artisan migrate:fresh

# get into tinker
php artisan tinker

# create a test user
# username=tester
# password=123123
App\User::create(['user_id'=>99,'first_name'=>'Tester','last_name'=>'Testing','email'=>'test@test.com','username'=>'tester','password'=>'123123']);

# create a goal for that user
App\Goal::create(['goal_id'=>99, 'user_id'=>99,'goal_type'=>'Daily','nutrition_type'=>'Calories', 'value'=>'2000']);

# create a consumable log for that user
App\Consumable_Log::create(['consumable_log_id'=>99,'user_id'=>99]);

# create consumable collections
App\Consumable_Collection::create(['consumable_collection_id'=>99,'consumable_log_id'=>99,'consumable_type'=>'Breakfast']);
App\Consumable_Collection::create(['consumable_collection_id'=>100,'consumable_log_id'=>99,'consumable_type'=>'Lunch']);
App\Consumable_Collection::create(['consumable_collection_id'=>101,'consumable_log_id'=>99,'consumable_type'=>'Dinner']);
App\Consumable_Collection::create(['consumable_collection_id'=>102,'consumable_log_id'=>99,'consumable_type'=>'Other']);
App\Consumable_Collection::create(['consumable_collection_id'=>103,'consumable_log_id'=>99,'consumable_type'=>'Snack']);

# create consumable items
App\Consumable_Item::create(['consumable_item_id'=>100,'consumable_collection_id'=>99, 'item_id'=>'5ab0b2008739d9ed2bf27a98','item_name'=>'item1',"serving"=>"2.5"]);
App\Consumable_Item::create(['consumable_item_id'=>200,'consumable_collection_id'=>100, 'item_id'=>'5796d978b6d0d1c454988b57','item_name'=>'item2',"serving"=>"2.5"]);
App\Consumable_Item::create(['consumable_item_id'=>300,'consumable_collection_id'=>101, 'item_id'=>'54f67b454b70c0c8314bc0bf','item_name'=>'item3',"serving"=>"2.5"]);
App\Consumable_Item::create(['consumable_item_id'=>400,'consumable_collection_id'=>102, 'item_id'=>'550b07347464e666054ace4d','item_name'=>'item4',"serving"=>"2.5"]);
App\Consumable_Item::create(['consumable_item_id'=>500,'consumable_collection_id'=>103, 'item_id'=>'5581b91e5aa3265007d124a1','item_name'=>'item5',"serving"=>"2.5"]);
App\Consumable_Item::create(['consumable_item_id'=>600,'consumable_collection_id'=>99, 'item_id'=>'5581b91e5aa3265007d124a1','item_name'=>'item5',"serving"=>"2.5"]);
