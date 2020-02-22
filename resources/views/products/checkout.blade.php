@extends('layout')
@section('content')
<div class="container-fluid">
	<h1>Checkout Details</h1>
	@if (Session::has('message'))
	<div class="alert alert-success" style="text-align: center;">
    	<strong>Success!</strong> {{ Session::get('message') }}
  	</div>
  	<div class="alert alert-info" style="text-align: center;">
	  	<strong>Info!</strong> You Order Id number is <b>{{ Session::get('order_id') }}</b> remeber this id to get the tracking information of your order
	</div>
  	@endif
	<div class="col-md-5"><br />
	<form action="{{route('place_order')}}" method="POST">
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
	      	<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
		</div>
		@if (Auth::check())
		<div class="form-group">
	      	<label for="price">Employee Id:</label>
	      	<input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ Auth::user()->id }}" disabled="true">
	    </div>
	    @endif
	    <div class="form-group">
	      	<label for="price">Phone Number:</label>
	      	<input type="text" class="form-control" id="phone_no" placeholder="Enter Price" name="phone_no">
	    </div>
		<div class="form-group">
		  	<label for="description">Address:</label>
		  	<textarea class="form-control" rows="5" id="descriotion" name="address"></textarea>
		</div>
		@if ($cartCount == 0)
		<button type="submit" class="btn" style="color: #fff;background-color: #a80534;" disabled="true">Place Order</button> <span style="color: red;font-weight: bold;">YOUR CART IS EMPTY</span></button>
		@elseif (Auth::check())
			@if ($user->balance < 200)
	    	<button type="submit" class="btn" style="color: #fff;background-color: #a80534;" disabled="true">Place Order</button> <span style="color: red;font-weight: bold;">YOUR BALANCE IS NOT ENOUGH</span></button>
	    	@else
	    	<button type="submit" class="btn" style="color: #fff;background-color: #a80534;">Place Order</button>
	    	@endif
		@else
	    <button type="submit" class="btn" style="color: #fff;background-color: #a80534;">Place Order</button>
	    @endif
	</form>
	</div>
</div>
@endsection