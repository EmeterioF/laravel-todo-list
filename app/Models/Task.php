<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//MODEL is used to make php communicate with the database 
class Task extends Model
{   
    //constants we can use for the priority since we define it as an enum this is just for type safety
    // eg usage: Task::create(['priority'] => Task::PRIORITY_LOW)];
    const PRIORITY_LOW = 'low';
    const PRIORITY_MEDIUM = 'medium';
    const PRIORITY_HIGH = 'high';
    
    protected $fillable = ['title', 'is_completed', 'priority', 'due_date', ];

    //automatically change data type when using the model from string to php boolean
    protected $casts = [
        'is_completed'=> 'boolean',
    ];

}
