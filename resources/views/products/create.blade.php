@extends('layouts.app')
@section('content')
<div class="container-fluid">
	@if (Session::get('success'))
	<div class="alert alert-success" style="text-align: center;">
    	<strong>Success!</strong> {{ Session::get('success')}}
  	</div>
  	@elseif (Session::get('error'))
  	<div class="alert alert-success" style="text-align: center;">
    	<strong>Success!</strong> {{ Session::get('error')}}
  	</div>
  	@endif
	<div class="col-md-5">
	<h1>Add Product</h1>
	<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
	      	<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
		</div>
	    <div class="form-group">
	      	<label for="price">Price:</label>
	      	<input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
	    </div>
	    <div class="form-group">
	      	<label for="color">Dial Color:</label>
	      	<input type="text" class="form-control" id="dial-color" placeholder="Enter Color" name="dial_color">
	    </div>
	    <div class="form-group">
	      	<label for="color">Chain Color:</label>
	      	<input type="text" class="form-control" id="chain-color" placeholder="Enter Color" name="chain_color">
	    </div>
	    <div class="form-group">
		    <label for="category">Select Category:</label>
		    <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category">
		</div>
		<div class="form-group">
			<label for="display_image">Display Image:</label>
		    <input type="file" class="form-control-file border" name="display_image">
		</div>
		<div class="form-group">
			<label for="description_image">Description Image:</label>
		    <input type="file" class="form-control-file border" name="description_image">
		</div>
		<div class="form-group">
		  	<label for="description">Description:</label>
		  	<textarea class="form-control" rows="5" id="descriotion" name="description"></textarea>
		</div>
	    <button type="submit" class="btn" style="color: #fff;background-color: #a80534;">Submit</button>
	</form>
	</div>
</div>
@endsection