<?php use App\User; ?>
@extends('layout')
@section('content')
<div class="row">
	<div class="col-6">
	  <h1>Other Projects List</h1>
	</div>
	<div class="col-6 text-right">
    <form action="{{ route('all_search') }}" method="POST">
      @csrf
      <div class="input-group">
          <input type="text" class="form-control" name="searchKey"
              placeholder="Search projects"> 
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
              </button>
          </span>
      </div>
    </form>
	</div>
</div>
<table class="table table-bordered">
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>Name of user</th>
    <th>Actions</th>
  @foreach ($projects as $project)
  <tr>
  <td><a href="{{ asset('storage/'.$project->image_path) }}" target="_blank"><img src="{{ asset('storage/'.$project->image_path) }}" width="100px"></a></td>
  <td>{{$project->name}}</td>
  <td>{{$project->description}}</td>
  <td>{{$project->created_at}}</td>
  <td><?php 
            $user = User::find($project->user_id);
            echo $user->name;
   ?></td>
  <td class="text-center">
    <a class="btn btn-default" href="{{ route('tasks', $project->id) }}" role="button"><i class="fas fa-tasks"></i></a> / 
    <a class="btn btn-default" href="{{ route('delete_project', $project->id) }}" role="button"><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection
