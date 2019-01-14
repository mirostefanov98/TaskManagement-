@extends('layout')
@section('content')
<div class="row">
	<div class="col-10">
	  <h1>Other Projects List</h1>
	</div>
	<div class="col-2 text-right">
	</div>
</div>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>User_ID</th>
    <th>Actions</th>
  @foreach ($projects as $project)
  <tr>
  <td>{{$project->id}}</td>
  <td><a href="{{ asset('storage/'.$project->image_path) }}" target="_blank"><img src="{{ asset('storage/'.$project->image_path) }}" width="100px"></a></td>
  <td>{{$project->name}}</td>
  <td>{{$project->description}}</td>
  <td>{{$project->created_at}}</td>
  <td>{{$project->user_id}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="{{ route('tasks', $project->id) }}" role="button"><i class="fas fa-tasks"></i></a> / 
    <a class="btn btn-default" href="{{ route('delete_project', $project->id) }}" role="button"><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection
