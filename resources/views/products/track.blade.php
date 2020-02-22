@extends('layout')
@section('content')
<div class="container-fluid">
	<h1>Order Tracking</h1><br />
	<form action="{{route('track')}}" method="GET">
		@csrf
		<div class="row col-md-6">
			<div class="form-group">
				<label for="name">Order Id:</label>
		      	<input type="text" class="form-control" id="order_id" placeholder="Enter Order Id" name="order_id">
			</div>
		    <button type="submit" class="btn" style="color: #fff;background-color: #a80534;">Submit</button><br /><br />	
		</div>
	</form>
	<table class="table">
	    <thead>
	      	<tr>
		        <th style="text-align: center;">Item</th>
		        <th>Quantity</th>
		        <th>Status</th>
	      	</tr>
	    </thead>
	    @if ($order)
	    <tbody>
	   		<?php
	   		$items = explode(',', $order->items);
	   		//dd($items);
	   		for ($i=0; $i < (count($items) - 1); $i++) { 
	   			$single = explode('=', $items[$i]);
	   			$display_image = 'storage/images/products/'.$single[0].'_display.jpg';
			?>
			<tr>
				<td style="text-align: center;"><img src="{{ asset($display_image) }}" style="width: 30%;" /></td>
				<td><h2><?= $single[1] ?></h2></td>
				<td><h2>{{ $order->status }}</h2></td>
			</tr>
			<?php
			}
			?>
	    </tbody>
	    @endif
    <tbody>

    </tbody>
  </table>
</div>
@endsection