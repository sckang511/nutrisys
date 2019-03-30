<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    protected $table = 'nutritions';

    protected $primaryKey = 'nutrition_id';

    protected $fillable = [
        'nutrition_id', 'item_id', 'item_name', 'serving_qty', 'serving_unit',
        'calorie', 'total_fat', 'saturated_fat', 'cholesterol', 'sodium', 'image',
        'carbohydrate', 'dietary_fiber', 'sugar', 'protein', 'potassium',
    ];
}
