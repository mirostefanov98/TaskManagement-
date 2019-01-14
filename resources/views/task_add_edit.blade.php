@extends('layout')
@section('content')
<h1>{{ $project ? 'Edit' : 'Add' }} Project</h1>
<div class="row">
<div class="col-md-6">
  <form action="{{route('insert_project', $id)}}" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $project ? $project->name : '' }}">
    @if($errors->has('name'))
    <h5 class="text-danger">{{ $errors->first('name') }}</h5>
    @endif
  </div>
  <div class="form-group">
    <label for="desc">Description:</label>
  <textarea class="form-control" name="desc" rows="3" id="desc" placeholder="Description">{{ $project ? $project->description : '' }}</textarea>
  @if($errors->has('desc'))
    <h5 class="text-danger">{{ $errors->first('desc') }}</h5>
  @endif
  </div>
  <div class="form-group">
    <label for="image">Upload image:</label>
    <input type="file" name="image" accept="image/*" class="form-control" id="image">
  @if($errors->has('image'))
    <h5 class="text-danger">{{ $errors->first('image') }}</h5>
  @endif
  </div>
  @csrf
  <button type="submit" name="process" class="btn btn-default">{{ $project ? 'Save' : 'Insert' }}</button>
</form>
</div>
</div>
@endsection