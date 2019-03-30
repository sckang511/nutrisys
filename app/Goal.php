<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    //
    protected $fillable = [
        'user_id', 'goal_type', 'nutrition_type', 'value',
    ];
}
