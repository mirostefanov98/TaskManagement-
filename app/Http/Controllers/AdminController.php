<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdmin;

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
        $projects = Project::where('user_id','<>',Auth::id())->get();
        $data = array('projects' => $projects);
        return view('other_projects', $data);
    }

    public function ListUsers()
    {
        $users = User::where('is_admin',0)->get();
        $data = array('users' => $users);
        return view('users_list', $data);
    }

}
