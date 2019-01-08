@extends('layout')
@section('content')
<h1>Add Task</h1>
<div class="row">
  <div class="col-md-6">
    <form action="{{route('insertTask')}}" method="POST">
    <div class="form-group">
      <label for="task">Name:</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>
    <div class="form-group">
      <label for="desc">Priority:</label>
      <select name="priority" class="form-control">
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
      </select>
    </div>
    @csrf
    <button type="submit" name="process" class="btn btn-default">Insert</button>
  </form>
  </div>
</div>
@endsection