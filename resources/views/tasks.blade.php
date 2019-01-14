@extends('layout')
@section('content')
<div class="row">
	<div class="col-3 text-left">
	  <h1>Tasks List of project = {{ session('project_id') }}</h1>
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
  <td>@if ($task->status == 0)
          In Process
      @else
          Finished
      @endif
  </td>
  <td>
    @if($task->priority == 1) Low
    @elseif ($task->priority == 2) Medium
    @elseif ($task->priority == 3) High
    @endif
  </td>
  <td>{{$task->created_at}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="{{ route('change_status', $task->id) }}" role="button"><i class="@if($task->status == 0) fas fa-check-circle @else fas fa-minus-circle @endif"></i></a> / 
    <a class="btn btn-default" href="{{ route('task_add_edit', $task->id) }}" role="button"><i class="fas fa-pencil-alt"></i></a> / 
    <a class="btn btn-default" href="{{ route('delete_task', $task->id) }}" role="button"><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection
