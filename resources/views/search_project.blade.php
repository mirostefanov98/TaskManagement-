@extends('layout')
@section('content')
<div class="row">
  <div class="col-4">
    <h1>My projects</h1>
  </div>
  <div class="col-4">
    <form action="{{ route('search_project') }}" method="POST">
      @csrf
      <div class="input-group">
          <input type="text" class="form-control" name="searchKey"
              placeholder="Search projects"> 
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
              </button>
          </span>
      </div>
    </form>
  </div>
  <div class="col-4 text-right">
    <a href="{{ route('project_add_edit') }}"><button type="button" class="btn btn-default">Add project</button></a>
  </div>
</div>
<table class="table table-bordered text-center">
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Description</th>
    <th>Date</th>
    <th>Actions</th>
  @foreach ($projects as $project)
  <tr>
  <td><a href="{{ asset('storage/'.$project->image_path) }}" target="_blank"><img src="{{ asset('storage/'.$project->image_path) }}" width="100px" alt="No image"></a></td>
  <td>{{$project->name}}</td>
  <td>{{$project->description}}</td>
  <td>{{$project->created_at}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="{{ route('tasks', $project->id) }}" role="button"><i class="fas fa-tasks"></i></a> / 
    <a class="btn btn-default" href="{{ route('project_add_edit', $project->id) }}" role="button"><i class="fas fa-pencil-alt"></i></a> / 
    <a class="btn btn-default" href="{{ route('delete_project', $project->id) }}" role="button" 
      onclick="if(!confirm('Are you sure to delete this project?')) return false "><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection
