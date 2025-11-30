<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Task extends Model
{   
    use SoftDeletes;# THIS ENABLES THE SOFT DELETE FEATURE KAPAG NAG DELETE KA HINDI SIYA MA DEDELETE SA DB
    #SA APP MO LANG SIYA MADEDELETE

    protected $fillable = ['title', 'is_completed', 'priority', 'due_date', ];

    # KINO KONVERT NIYA YUNG IS COMPLETED NA FIELD SA BOOLEAN AUTOMATICALLY KASE STRING YAN PAG FINETCH WITHOUT THIS
    protected $casts = [
        'is_completed'=> 'boolean',
    ];

}
