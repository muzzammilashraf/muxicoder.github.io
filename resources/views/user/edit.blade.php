@extends('layouts.app')
@section('content')
<div class="container-fluid">
	@if (Session::has('message'))
	<div class="alert alert-success" style="text-align: center;">
    	<strong>Success!</strong> {{ Session::get('message') }}
  	</div>
  	@endif
<div class=" col-md-5">
	<h1>Edit User</h1>
	<form action="{{route('user.update', $show->id)}}" method="POST">
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
	      	<input type="text" class="form-control" id="name" name="name" value="{{ $show->name }}">
		</div>
		@if ($user->role == 'admin')
		<div class="form-group">
			<label for="balance">Balance:</label>
	      	<input type="text" class="form-control" id="balance" name="balance" value="{{ $show->balance }}">
		</div>
		@endif
	    <div class="form-group">
	      	<label for="email">Email:</label>
	      	<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $show->email }}">
	    </div>
	    <div class="form-group">
	      	<label for="role">Role:</label>
	      	<input type="text" class="form-control" id="role" placeholder="Role" name="role" value="{{ $show->role }}">
	    </div>
	    <div class="form-group">
		    <label for="status">Status:</label>
		    <input type="text" class="form-control" id="status" placeholder="Enter Status" name="status" value="{{ $show->status }}">
		</div>
	    <button type="submit" class="btn" style="color: #fff;background-color: #a80534;">Submit</button>
	</form>
	</div>
</div>
@endsection