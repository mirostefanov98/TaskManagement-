@extends('layout')
@section('content')
<h1>{{ $task ? 'Edit' : 'Add' }} task</h1>
<div class="row">
<div class="col-md-6">
  <form action="{{route('insert_task', $id)}}" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $task ? $task->name : '' }}">
    @if($errors->has('name'))
    <h5 class="text-danger">{{ $errors->first('name') }}</h5>
    @endif
  </div>
  <div class="form-group">
    <label for="priority">Priority:</label>
    <select name="priority" id="priority" class="form-control">
      <option value="1" @if(isset($task->priority) && $task->priority == 1) selected @endif>Low</option>
      <option value="2" @if(isset($task->priority) && $task->priority == 2) selected @endif>Medium</option>
      <option value="3" @if(isset($task->priority) && $task->priority == 3) selected @endif>High</option>
    </select>
  </div>
  @csrf
  <button type="submit" name="process" class="btn btn-default">{{ $task ? 'Save' : 'Insert' }}</button>
</form>
</div>
</div>
@endsection