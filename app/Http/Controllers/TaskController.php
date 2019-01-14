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
        $tasks = Task::where('project_id',$project_id)->get();
        $data = array('tasks' => $tasks);
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

 }
