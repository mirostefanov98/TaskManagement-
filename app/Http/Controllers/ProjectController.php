<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ListProjects()
    {
        session()->forget('project_id');
        $projects = Project::where('user_id', Auth::id())->get();
        $data = array('projects' => $projects);
        return view('projects', $data);
    }

    public function AddEditProject($id=0)
    {
        $project = array();
        if ($id) {
            $project = Project::where('id', $id)->first();
        }
        $data = array('id' => $id, 
                      'project' => $project );
                return view('project_add_edit', $data);
    }

    public function InsertProject($id , Request $request)
    {
        if ($id) {
          $project = Project::find($id);
        }
        else {
          $project = new Project;
        }        
        $validation = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ],[
            'name.required' => 'Моля въведете име!',
            'desc.required' => 'Моля въведете Описание!',
            'image.image' => 'Само формат на изображения',
        ]);

        $project->name = $request->name;
        $project->description = $request->desc;
        $project->user_id = Auth::id();
        if (isset($request->image)) {
        $project->image_path = $request->file('image')->store('images','public');
        }
        else{
            $project->image_path = "Don't have image";
        }
        $project->save();

        return redirect()->route('projects');
    }

    public function DeleteProject($id)
    {
        $project = Project::find($id);
        Storage::disk('public')->delete($project->image_path);
        Project::where('id', $id)->delete();
        Task::where('project_id', $id)->delete();
        return redirect()->route('projects');
    }

}
