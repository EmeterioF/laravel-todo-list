<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // import model 

class TaskController extends Controller
{   
    //basic syntax MODEL::method                    MADE BY THE ONE AND ONLY EMETERIO FIGURACION
    /** ORM METHODS
     * 
     * ---------------------GET---------------------------------
     * 
     * METHOD               VALUE                   DESC
     * find()               id of the record        Finds via id
     * all()                none                    Finds all records
     * 
     * WAYS TO FIND USING FIND
     *  - finding specific column
     * $variable = Model::find(4)
     * return $variable->specific_field             this will return a specific field
     * 
     * foreach ($tasks as $task ) {
     *    echo $task->title . '<br/>';
     * }
     * 
     * 
     * - finding with fallback BETTER TO USE everytime
     * return Model::findOrFail()                   will display 404 not found if the record doesn't exist
     */
    
    public function index(){
        $tasks = Task::all();
        return $tasks;
    }

    /**
     * ---------------------WHERE---------------------------------
     * // Syntax Model::where('column', 'operator', 'value')->get();
     * 
     * METHOD               VALUE                   DESC
     * where            column, operator, value     fetches based on the where condition
     * 
     * //multiple conditions syntax
     * 
     * Model::where(args)->where(args)->get(); //acts like an AND operator both should be satisfied
     * Model::where(args)->orWhere(args)->get(); //acts like an OR operator One should be satisfied
     */

    public function where(){
        return Task::where('id', '=', '1')->orWhere('id', '=', '3')->get();
    }

    /**
     * ---------------------WHERE---------------------------------
     * // Syntax 
     * 1. create an instance    
     * $variableInstance = new Model();
     * 
     * 2. make the data for all columns
     * $variableInstance->columnName = value;
     * 
     * 3. after inserting to all save it or INSERT IT INTO DB
     * $variableInstance->save();
     * 
     * METHOD               VALUE                   DESC
     * insert            
     * 
     * //multiple conditions syntax
     * 
     * Model::where(args)->where(args)->get(); //acts like an AND operator both should be satisfied
     * Model::where(args)->orWhere(args)->get(); //acts like an OR operator One should be satisfied
     */

    public function insertTask(){
        $task = new Task();
        $task->title = 'finish to do list';
        $task->priority = Task::PRIORITY_HIGH;
        $task->due_date = date('2025-12-30');
        $task->save();

        return dd('success');
    }

}
