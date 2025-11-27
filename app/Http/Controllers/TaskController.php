<?php

namespace App\Http\Controllers;
http://todolist.test/
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
        return view('home', compact('tasks'));
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

    public function createTask(Request $request){
        
        Task::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'due_date' => $request->due_date
        ]);

        return redirect()->route('task.home');
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
