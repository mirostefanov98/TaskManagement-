<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectUser;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ListProjects()
    {
        $user=Auth::user();
        $projects=array();
        foreach ($user->projectsOfuser as $project) {
            $projects[] = Project::where('id', $project->id)->get();
        }
        $data = array('projects' => $projects);
        $tests = DB::table('projects')
            ->join('users', 'project_user.user_id', '=', 'users.id')
            ->join('project_user', 'projects.id', '=', 'project_user.project_id')
            ->where('project_user.user_id','project_user.project_id')
            ->get();
        var_dump($tests);
        exit();
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
        $project->name = $request->name;
        $project->description = $request->desc;
        $project->save();
        $projectuser = new ProjectUser;
        $projectuser->project_id = $project->id;
        $projectuser->user_id =  Auth::user()->id;
        $projectuser->save();
        return redirect()->route('projects');
    }

}
