<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
<<<<<<< HEAD
    //
    protected $fillable = [
        'user_id', 'goal_type', 'nutrition_type', 'value',
    ];
}
=======
    protected $primaryKey = 'goal_id';

    protected $fillable = [
        'goal_id', 'user_id', 'goal_type', 'value', 'nutrition_type',
    ];
}
>>>>>>> 67a640988aab538e62e7324520e7eebe64ec49b0
