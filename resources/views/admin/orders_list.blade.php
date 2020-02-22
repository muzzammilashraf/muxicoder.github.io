@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<table class="table">
    <thead>
      	<tr>
      		<th>id</th>
      		<th>User Id</th>
	        <th>Name</th>
	        <th>Phone No</th>
	        <th>Address</th>
	        <th>Items</th>
	        <th>Net Payable</th>
	        <th>Status</th>
	        <th>Created At</th>
	        @if ($user->role == 'admin')
	        <th>Action</th>
	        @endif
      	</tr>
    </thead>
    <tbody>
    	@foreach ($orders as $order)
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->user_id}}</td>
	        <td>{{$order->name}}</td>
	        <td>{{$order->phone_no}}</td>
	        <td>{{$order->address}}</td>
	        <td>{{$order->items}}</td>
	        <td>{{$order->net_payable}}</td>
	        <td>{{$order->status}}</td>
	        <td>{{$order->created_at}}</td>
	        @if ($user->role == 'admin')
	        <td><a href="{{ route('order-edit', $order->id) }}" style="color: #a80534;">Edit</a></td>
      		@endif
      	</tr>
      	@endforeach
    </tbody>
  </table>
</div>
@endsection