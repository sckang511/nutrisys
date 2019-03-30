<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $primaryKey = 'goal_id';

    protected $fillable = [
        'goal_id', 'user_id', 'goal_type', 'value', 'nutrition_type',
    ];
}