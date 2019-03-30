<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable_Item extends Model
{
    protected $primaryKey = 'consumable_item_id';

    protected $fillable = [
        'consumable_item_id', 'consumable_collection_id', 'nutrition_id',
    ];
}
