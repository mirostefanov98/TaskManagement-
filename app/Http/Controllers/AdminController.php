<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function __construct()
    {
        session()->forget('project_id');
        $this->middleware('auth');
        $this->middleware(CheckAdmin::class);
    }

    public function OtherProjects()
    {
        $projects = Project::all();
        $data = array('projects' => $projects);
        return view('other_projects', $data);
    }

    public function ListUsers()
    {
        $users = User::all();
        $data = array('users' => $users);
        return view('users_list', $data);
    }

    public function DeleteUser($id)
    {
       $projects = Project::where('user_id', $id)->get();
       foreach ($projects as $project) {
            Task::where('project_id', $project->id)->delete();
            Storage::disk('public')->delete($project->image_path);
       }
       Project::where('user_id', $id)->delete();
       User::where('id', $id)->delete();
       return redirect()->route('users_list');
    }

    public function SearchProject(Request $request)
    {
        $searchKey = $request->searchKey;
        $projects = Project::query()
                           ->where('name', 'LIKE', "%{$searchKey}%") 
                           ->orwhere('description', 'LIKE', "%{$searchKey}%") 
                           ->get(); 
        $data = array('projects' => $projects);
        return view('search_project', $data);
    }

}
