@extends('layout')
@section('content')
<h1>Edit Task</h1>
<div class="row">
  <div class="col-md-6">
    <form action="" method="POST">
    <div class="form-group">
      <label for="task">Name:</label>
      <input type="text" name="name" class="form-control" id="name" placeholder="#">
    </div>
    <div class="form-group">
      <label for="desc">Priority:</label>
      <select name="priority" class="form-control">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select>
    </div>
    <button type="submit" name="process" class="btn btn-default">Save</button>
  </form>
  </div>
</div>
@endsection