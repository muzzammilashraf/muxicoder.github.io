@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<table class="table">
    <thead>
      	<tr>
      		<th>id</th>
	        <th>Name</th>
	        <th>price</th>
	        <th>dial color</th>
	        <th>chain color</th>
	        <th>category</th>
	        <th>Created At</th>
	        <th>Updated At</th>
      	</tr>
    </thead>
    <tbody>
    	@foreach ($list as $product)
		<tr>
			<td>{{$product->id}}</td>
	        <td>{{$product->name}}</td>
	        <td>{{$product->price}}</td>
	        <td>{{$product->dial_color}}</td>
	        <td>{{$product->chain_color}}</td>
	        <td>{{$product->category}}</td>
	        <td>{{$product->created_at}}</td>
	        <td>{{$product->updated_at}}</td>
      	</tr>
      	@endforeach
    </tbody>
  </table>
</div>
@endsection