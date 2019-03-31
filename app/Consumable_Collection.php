<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable_Collection extends Model
{
    
    protected $table = 'consumable_collections';
    public $timestamps = false;

    protected $primaryKey = 'consumable_collection_id';

    protected $fillable = [
        'consumable_collection_id', 'user_id', 'consumable_type', 'date',
    ];
}
