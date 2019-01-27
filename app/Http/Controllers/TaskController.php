<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Auth;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ListTasks($project_id)
    {
        session(['project_id' => $project_id]);
        $project = Project::where('id',$project_id)->first();
        $tasks = Task::where('project_id',$project_id)->orderBy('priority', 'desc')->paginate(3);
        $data = array('project' => $project,
                    'tasks' => $tasks );
        return view('tasks', $data);
    }

    public function AddEditTask($id=0)
    {
        $task = array();
        if ($id) {
            $task = Task::where('id', $id)->first();
        }
        $data = array('id' => $id, 
                      'task' => $task );
        return view('task_add_edit', $data);
    }

    public function InsertTask($id, Request $request)
    {
        if ($id) {
          $task = Task::find($id);
        }
        else {
          $task = new Task;
        }  
        $validation = $request->validate([
            'name' => 'required',
        ]);

        $task->name = $request->name;
        $task->status = 0;
        $task->priority = $request->priority;
        $task->project_id = session('project_id');
        $task->save();
        return redirect()->route('tasks', session('project_id'));
    }

    public function DeleteTask($id)
    {
        Task::where('id', $id)->delete();
        return redirect()->route('tasks', session('project_id'));
    }

    public function ChangeStatus($id)
    {
        $task = Task::find($id);
        if ($task->status == 0) {
            $task->status = 1;
        }
        else{
            $task->status = 0;
        }
        $task->save();
        return redirect()->route('tasks', session('project_id'));
    }
}
