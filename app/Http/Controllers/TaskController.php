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

    /**
     * ---------------------UPDATE---------------------------------
     * // Syntax 
     * 1. find the one you want to update  
     * $variable = Model::find(id);  via id
     * $variable = Model::where(args)->first(); via where
     * 
     * 2. make update chnages on the variable you found
     * $variable->column_name = new_value;
     * 
     * 3. after updating the things you want to update, save it or UPDATE IT INTO DB
     * $variable->save();
     * 
     * METHOD               VALUE                   DESC
     * update            
     * 
     */

    public function update(){
        $updatedTask = Task::find(1);
        $updatedTask->title = 'exercise later';
        $updatedTask->save();
        dd('success');
    }

    /**
     * ---------------------DELETE---------------------------------
     * // Syntax 
     * 1. find the one you want to delete  
     * $variable = Model::find(id)->delete();  via id
     * $variable = Model::where(args)->delete(); via where
     * 
     */

    public function delete(){
        $updatedTask = Task::find(2)->delete();
        dd('success');
    }

    //-------------------------------------MASS ASSIGNMENT-----------------------------------------
    /** MASS ASSIGNMENT IS A WAY FOR US TO EDIT MULTIPLE COLUMNS AT ONCE  */

    /** CREATE 
     *  its like instead of doing it like this for every column you want to alter $task->title = 'finish to do list';
     *  you do it like this:
     *  Model::create([
     *      'column_name' => 'new_value';
     * ])
     */

    public function createTask(){
        Task::create([
            'title' => 'DO EXERCISE',
            'priority' => Task::PRIORITY_LOW,
            'due_date' => date('2025-11-29')
        ]);

        dd('success');
    }

    /** UPDATE 
     *  find the one you update first 
     *  use the update method to update and put the column you want to update and its new value
    */
    public function updateTask(){
        Task::find(1)->update([
            'title' => 'updated_title'
        ]);
        dd('updated succcessflyy');
    }

    /** THIS IS THE WAY TO RETRIEVE SOFT DELETED RECORDS*/
    public function getDeletedRecords(){
        return Task::onlyTrashed()->get();
    }

    /** RESTORES THE SOFT DELETED DATA AND MAKES IT AVAILABLE FOR FETCHING AGAIN
     *  Syntax:
     *  Model::withTrashed()->where(args)->restore();
     */
    public function restoreDeletedRecord(){
        Task::withTrashed()->where('id',2)->restore();
        dd('successfully restored');
    }

    /** RESTORES THE SOFT DELETED DATA AND MAKES IT AVAILABLE FOR FETCHING AGAIN
     *  Syntax:
     *  Model::withTrashed()->where(args)->restore();
     */
    public function permaDelete(){
        Task::withTrashed()->where('id',3)->forceDelete();
        dd('successfuly deleted the record permanently');
    }
}
