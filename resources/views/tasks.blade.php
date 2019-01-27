@extends('layout')
@section('content')
<div class="row">
	<div class="col-8 text-left">
	  <h1>Tasks of project - {{ $project->name }}</h1>
	</div>
	<div class="col-4 text-right">
	  <a href="{{ route('task_add_edit') }}"><button type="button" class="btn btn-default">Add task</button></a>
	</div>
</div>
<table class="table table-bordered text-center">
  <tr>
    <th>Status</th>
    <th>Name</th>
    <th>Priority</th>
    <th>Date</th>
    <th>Actions</th>
  @foreach ($tasks as $task)
  <tr>
  <td>
    <a title="@if ($task->status == 0)
          Finished
      @else
          In process
      @endif" class="btn btn-default" href="{{ route('change_status', $task->id) }}" role="button"
      onclick="if(!confirm('Are you want to change task status?')) return false "><i class="@if($task->status == 0) fas fa-check-circle @else fas fa-minus-circle @endif"></i></a>
  </td>
  <td>{{$task->name}}</td>
  <td>
    @if($task->priority == 1) Low
    @elseif ($task->priority == 2) Medium
    @elseif ($task->priority == 3) High
    @endif
  </td>
  <td>{{$task->created_at}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="{{ route('task_add_edit', $task->id) }}" role="button"><i class="fas fa-pencil-alt"></i></a> / 
    <a class="btn btn-default" href="{{ route('delete_task', $task->id) }}" role="button"
      onclick="if(!confirm('Are you sure to delete this task?')) return false "><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
<div class="row justify-content-center">{{ $tasks->links() }}</div>
@endsection
