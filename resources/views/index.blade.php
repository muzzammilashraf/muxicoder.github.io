@extends('layout')
@section('content')

<div class="jumbotron text-center">
  <img src="{{ asset('/images/Facebook-Cover.jpg' )}}" class="banner" />
</div>

<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"This company is the best. I am so happy with the result!"<br><span>Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"One word... WOW!!"<br><span>John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"Could I... BE any more happy with this company?"<br><span>Chandler Bing, Actor, FriendsAlot</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<!-- New Arrival -->
<div id="contact" class="container-fluid">
  <h2 style="color: #a80534;">new arrival</h2>
  <div class="row">
    @foreach ($new_arrival as $product)
    <?php $display_image = "storage/images/products/".$product->id."_display.jpg" ?>
    <div class="col-sm-3" style="margin: 10px 0px 10px 0px;padding: 15px;">
      <a href="{{ route('product-detail') }}/{{$product->id}}"><img src="{{ asset($display_image) }}" style="width:100%;" /></a>
      <p><b style="text-transform: capitalize;"><a href="{{ route('product-detail') }}/{{ $product->id }}" class="link">{{$product->name}}</a></b><br />
        <span style="color: #a80534">Rs. {{$product->price}}</span><br />
        <span>Dial Color: <b style="text-transform: capitalize;">{{$product->dial_color}}</b></span><br />
        <span>Chain Color: <b style="text-transform: capitalize;">{{$product->chain_color}}</b></span><br />
        @@@@@ <span style="float:right;">(0) Reviews</span>
      </p>
    </div>
    @endforeach
  </div>
  <br />
  <h2 style="color: #a80534;">top rated</h2>
  <div class="row">
    @foreach ($new_arrival as $product)
    <?php $display_image = "storage/images/products/".$product->id."_display.jpg" ?>
    <div class="col-sm-3" style="margin: 10px 0px 10px 0px;padding: 15px;">
      <a href="{{ route('product-detail')}}/{{ $product->id }}"><img src="{{ asset($display_image) }}" style="width:100%;" /></a>
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

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="{{ asset('/images/map.png') }}" class="w3-image w3-greyscale-min" style="width:100%">

@endsection