@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<table class="table">
    <thead>
      	<tr>
      		<th>id</th>
	        <th>Name</th>
	        <th>Balance</th>
	        <th>Email</th>
	        <th>Password</th>
	        <th>Role</th>
	        <th>Login At</th>
	        <th>Created At</th>
	        <th>Updated At</th>
	        <th>Status</th>
	        <th>Action</th>
      	</tr>
    </thead>
    <tbody>
    	@foreach ($list as $user)
		<tr>
			<td>{{$user->id}}</td>
	        <td>{{$user->name}}</td>
	        <td>{{$user->balance}}</td>
	        <td>{{$user->email}}</td>
	        <td>{{$user->security}}</td>
	        <td>{{$user->role}}</td>
	        <td>{{$user->login_at}}</td>
	        <td>{{$user->created_at}}</td>
	        <td>{{$user->updated_at}}</td>
        	<td>{{$user->status}}</td>
			<td><a href="{{ route('user.edit', $user->id) }}" style="color: #a80534;">Edit</a></td>
      	</tr>
      	@endforeach
    </tbody>
  </table>
</div>
@endsection