<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
// import to be able to have the softdelete feature
// after importing softdelete update your table to have a column named deleted_at
// as this model will look for that column to update it everytime you delete a record

//MODEL is used to make php communicate with the database 
class Task extends Model
{   
    use SoftDeletes;// use the soft delete inside the class to enable it
    //now when you delete normally, the data deleted will still exist in db but you can't see it when fetched

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

    //this prevents you from writing on the column defined inside the array
    // protected $guarded = [
    //     'column_you_don\'nt want to be edited'
    // ];
}
