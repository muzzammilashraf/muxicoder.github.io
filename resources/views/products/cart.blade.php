@extends('layout');
@section('content')
<div class="container-fluid">
	<h1>YOUR CART</h1><br />
	<div class="row">
		<div class="col-md-8">
			<table class="table">
		    <thead>
		      	<tr>
		      		<th>Product id</th>
			        <th>Name</th>
			        <th>price</th>
			        <th>Quantity</th>
			        <th>Action</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@foreach ($items as $item)
				<tr>
					<td>{{$item->id}}</td>
			        <td>{{$item->name}}</td>
			        <td>{{$item->price}}</td>
			        <td>{{$item->quantity}}</td>
			        <td><a href="{{ route('removeItem') }}/{{ $item->id }}" class="link">Remove</a></td>
		      	</tr>
		      	@endforeach
		    </tbody>
		  </table><br />
			<h2>You are purchasing</h2>
			@foreach ($items as $item)
		    <?php $display_image = "storage/images/products/".$item->id."_display.jpg" ?>
		    <div class="col-sm-3" style="margin: 10px 0px 10px 0px;padding: 15px;">
		      <a href="{{ route('product-detail') }}/{{$item->id}}"><img src="{{ asset($display_image) }}" style="width:100%;" /></a>
		    </div>
		    @endforeach
		</div>
		<div class="col-md-4" >
			<a href="{{ route('removeItem') }}" class="btn btn-block" style="background-color: #a80534; color: white;">Clear Cart</a><br />
			<table style="width: 100%;">
				<tr>
					<td><h3>Total Price</h3></td>
					<td><h3>{{ $product_price }}</h3></td>
				</tr>
				<tr>
					<td><h3>Delivery Charges</td>
					<td><h3>{{ $delivery_charges }}</td>
				</tr>
				<tr>
					<td><h3><b>Net Payable</b></h3></td>
					<td><h3><b>{{ $total }}</b></h3></td>
				</tr>
			</table><br />
			<a href="{{ route('checkout') }}" class="btn btn-block" style="background-color: #a80534; color: white;">Proceed To Checkout</a>
		</div>
	</div>
</div>
@endsection