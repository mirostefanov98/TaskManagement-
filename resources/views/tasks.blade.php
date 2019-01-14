@extends('layout')
@section('content')
<div class="row">
	<div class="col-3">
	  <h1>Tasks List</h1>
	</div>
	<div class="col-9 text-right">
	  <a href="{{ route('task_add_edit') }}"><button type="button" class="btn btn-default">Add new task</button></a>
	</div>
</div>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Status</th>
    <th>Priority</th>
    <th>Date</th>
    <th>Actions</th>
  @foreach ($tasks as $task)
  <tr>
  <td>{{$task->id}}</td>
  <td>{{$task->name}}</td>
  <td>{{$task->status}}</td>
  <td>{{$task->priority}}</td>
  <td>{{$task->created_at}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="" role="button"><i class="fas fa-tasks"></i></a> / 
    <a class="btn btn-default" href="" role="button"><i class="fas fa-pencil-alt"></i></a> / 
    <a class="btn btn-default" href="" role="button"><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection
