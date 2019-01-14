@extends('layout')
@section('content')
<div class="row">
	<div class="col-10">
	  <h1>Users List</h1>
	</div>
	<div class="col-2 text-right">
	</div>
</div>
<table class="table table-bordered">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Date</th>
    <th>Actions</th>
  @foreach ($users as $user)
  <tr>
  <td>{{$user->id}}</td>
  <td>{{$user->name}}</td>
  <td>{{$user->email}}</td>
  <td>{{$user->created_at}}</td>
  <td class="text-center">
    <a class="btn btn-default" href="{{ route('delete_user', $user->id) }}" role="button"><i class="fas fa-trash-alt"></i></a>
  </td>
  </tr>
  @endforeach
</table>
@endsection
