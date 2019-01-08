@extends('layout')
@section('content')
<h1>{{ $project ? 'Edit' : 'Add' }} Project</h1>
<div class="row">
<div class="col-md-6">
  <form action="{{route('insertProject', $id)}}" method="POST">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $project ? $project->name : '' }}">
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
  <textarea class="form-control" name="desc" rows="3" id="desc" placeholder="Description">{{ $project ? $project->description : '' }}</textarea>
  </div>
  @csrf
  <button type="submit" name="process" class="btn btn-default">{{ $project ? 'Save' : 'Insert' }}</button>
</form>
</div>
</div>
@endsection