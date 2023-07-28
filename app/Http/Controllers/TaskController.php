<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');

    }
    public static function update($task){
        // dd($task);
        $task = Task::find($task);
        $task->update(['done'=> $task->done ? 0:1]);
        dd($task->done);
        return $task;
    }
    public function create(Request $request){
        return view('createTask', ['project_id'=> $request->input('id')]);
    }

    public function store(Request $request ){
        Task::create(['body'=>$request->input('body') , 'project_id'=> $request->get('id')]);
        return redirect('projects/'.$request->input('id'));         
    }
}
