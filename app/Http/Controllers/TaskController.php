<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Project;
use App\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{

public function __construct()
{ 
    $this->middleware('auth');
    $this->middleware('permission:create task', ['only' => ['create', 'store']]);
    $this->middleware('permission:edit task', ['only' => ['edit', 'update']]);
    $this->middleware('permission:delete task', ['only' => ['delete', 'destroy']]);
    $this->middleware('permission:index task', ['only' => ['index']]);
    
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::all();
        return view('tasks.index', compact('task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();



        return view('tasks.create', compact ('users', 'projects', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        $task = new Task(); 
        $task->task = $request->task; 
        $task->begindate = $request->begindate; 
        $task->enddate = $request->enddate; 
        $task->project_id = $request->project_id; 
        $task->activity_id = $request->activity_id; 
        $task->user_id = $request->user_id; 
        $task->save(); 

        return redirect()->route('tasks.index')->with('message', 'Task Toegevoegd');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {

        $users = User::all();
        $projects = Project::all();
        $activities = Activity::all();

        return view('tasks.edit', compact('task', 'users', 'projects', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        
        $task->task = $request->task; 
        $task->begindate = $request->begindate; 
        $task->enddate = $request->enddate; 
        $task->project_id = $request->project_id; 
        $task->activity_id = $request->activity_id; 
        $task->user_id = $request->user_id; 
        $task->save();
        
        return redirect()->route('tasks.index')->with('message', 'Task Gewijzigd');
    }



   /**
* Show the form for editing the specified resource.
*
* @param  \App\Task  $task
* @return \Illuminate\Http\Response
*/
   public function delete(Task $task)
   {

     

       return view('tasks.delete', compact('task'));
   }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try{
        $task->delete();
      
    }
    catch(Throwable $error) 
    {
        report($error);
        return redirect()->route('tasks.index')->with('message', 'Task kan niet worden verwijderd');

    }
    return redirect()->route('tasks.index')->with('message', 'Task verwijderd');

    }
}
