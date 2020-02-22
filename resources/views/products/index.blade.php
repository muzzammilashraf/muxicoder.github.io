@extends('layout')
@section('content')
<div id="contact" class="container-fluid">
  <div class="row">
    @foreach ($products as $product)
    <?php $display_image = "storage/images/products/".$product->id."_display.jpg" ?>
    <div class="col-sm-3" style="margin: 10px 0px 10px 0px;padding: 15px;">
      <a href="{{ route('product-detail') }}/{{$product->id}}"><img src="{{ asset($display_image) }}" style="width:100%;" /></a>
      <p><b style="text-transform: capitalize;"><a href="{{ route('product-detail') }}/{{$product->id}}" class="link">{{$product->name}}</a></b><br />
        <span style="color: #a80534">Rs. {{$product->price}}</span><br />
        <span>Dial Color: <b style="text-transform: capitalize;">{{$product->dial_color}}</b></span><br />
        <span>Chain Color: <b style="text-transform: capitalize;">{{$product->chain_color}}</b></span><br />
        @@@@@ <span style="float:right;">(0) Reviews</span>
      </p>
    </div>
    @endforeach
  </div>
</div>
@endsection