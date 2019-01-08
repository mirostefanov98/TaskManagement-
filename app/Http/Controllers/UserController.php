<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listProjects()
  {
    $projects = Project::where('user_id', Auth::user()->id)->get();
    $data = array('projects' => $projects);
    return view('ProjectsList', $data);
  }
  public function addProject($id=0)
  {
    $project = array();
    if ($id) {
      $project = Project::where('id', $id)->first();
    }
    $data = array('id' => $id,
                  'project' => $project );
    return view('AddProject', $data);
  }
  public function listTasks($project_id)
  {
    $tasks = Task::where('project_id',$project_id)->get();
    $data = array('tasks' => $tasks);
    return view('TasksList', $data);
  }
  public function addTask()
  {
     return view('AddTask');
  }
  public function editTask()
  {
     return view('EditTask');
  }
  public function insertProject($id , Request $request)
  {
    if ($id) {
      $project = Project::find($id);
    }
    else {
      $project = new Project;
    }
    $project->name = $request->name;
    $project->description = $request->desc;
    $project->user_id = Auth::user()->id;
    $project->save();
    return redirect()->route('ProjectsList');
  }
  public function insertTask(Request $request)
  {
    $name = $request->name;
    $priority = $request->priority;
    $task = new Task;
    $task->name = $name;
    $task->priority = $priority;
    $task->status = 0;
    $task->project_id = 0;
    $task->save();
    return redirect()->route('TasksList');
  }
  public function delProject($delId)
  {
    Project::where('id', $delId)->delete();
    return redirect()->route('ProjectsList');
  }

  
}
