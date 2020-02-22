@extends('layout')
@section('content')

<?php $display_image = "storage/images/products/".$product->id."_description.jpg";
?>
<div class="container-fluid">
	<h1>Product Detail</h1><br />
	<div class="row">
		<div class="col-md-4" style="text-align: center;">
			<img src="{{ asset($display_image) }}" width="60%">
		</div>
		<div class="col-md-4">
		<form action="{{ route('addToCart') }}/{{ $product->id }}" method="POST">
			@csrf
			<h4>Name: <b>{{ $product->name }}</b></h4>
			<h4>Dial Color: <b>{{ $product->dial_color }}</b></h4>
			<h4>Chain Color: <b>{{ $product->chain_color }}</b></h4>
			<div class="row">
				<div class="col-md-3"><h4>Category:</h4></div>
				<div class="col-md-9">
					<select class="form-control" id="category" name="category">
				    	@foreach (explode(",", $product->category) as $category)
				    	<option>{{$category}}</option>
				    	@endforeach
			    	</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"><h4>Quantity:</h4></div>
				<div class="col-md-9">
					<input type="text" name="qty" value="1" style="width:100%;padding-left: 5px;">
				</div>
			</div>
			<h4>Price: <b>Rs. {{ $product->price }}</b></h4>
			<h4><b>Description:</b> </h4>
			<p>{{ $product->description }}</p>
			<button type="submit" class="btn" style="background-color: #a80534;color: #fff;">Add To Cart</button>
		</form>
		</div>
	</div>
	<br />
	<h2>Available Colors</h2><br />
	@foreach ($colors as $color)
    <?php $display_image = "storage/images/products/".$color->id."_display.jpg" ?>
    <div class="col-sm-3" style="margin: 10px 0px 10px 0px;padding: 15px;">
      <a href="{{ route('product-detail') }}/{{$color->id}}"><img src="{{ asset($display_image) }}" style="width:100%;" /></a>
      <p><b style="text-transform: capitalize;"><a href="{{ route('product-detail') }}/{{$color->id}}" class="link">{{$color->name}}</a></b><br />
        <span style="color: #a80534">Rs. {{$color->price}}</span><br />
        <span>Dial Color: <b style="text-transform: capitalize;">{{$color->dial_color}}</b></span><br />
        <span>Chain Color: <b style="text-transform: capitalize;">{{$color->chain_color}}</b></span><br />
        @@@@@ <span style="float:right;">(0) Reviews</span>
      </p>
    </div>
    @endforeach
</div>

@endsection