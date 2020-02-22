<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Order;

class OrderController extends Controller
{
    public function track(Request $request)
    {
    	$cartCount = Cart::getContent()->count();
    	$order = Order::where('id', $request->order_id)->first();
    	$user = Auth::user();
    	return view('products.track', compact(['user', 'cartCount', 'order']));
    }

    public function list()
    {
    	$user = Auth::user();
        $user->role == 'admin' ? $orders = Order::all() : $orders = Order::where('user_id', $user->id)->get();
    	return view('admin.orders_list', compact(['user', 'orders']));
    }

    public function edit($id)
    {

    }
}
