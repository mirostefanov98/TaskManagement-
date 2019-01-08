@extends('layout')
@section('content')
<div class="row">
	<div class="col-3">
	  <h1>Projects List</h1>
	</div>
	<div class="col-9 text-right">
	  <a href="{{route('project_add_edit')}}"><button type="button" class="btn btn-default">Add new project</button></a>
	</div>
</div>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>Actions</th>
  @foreach ($projects as $project)
  <tr>
  <td>{{$project->id}}</td>
  <td>{{$project->name}}</td>
  <td>{{$project->description}}</td>
  <td>{{$project->created_at}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="" role="button"><i class="fas fa-tasks"></i></a> / 
    <a class="btn btn-default" href="" role="button"><i class="fas fa-pencil-alt"></i></a> / 
    <a class="btn btn-default" href="" role="button"><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection