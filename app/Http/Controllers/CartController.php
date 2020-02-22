<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Product;
use App\Order, App\User;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        //$product = Product::where('id', $request->id)->first();
        //$options = $request->except( 'price', 'qty');
    	//dd($product);
        //Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);
        $product = Product::where('id', $id)->first();
    	Cart::add($product->id, $product->name, $product->price, $request->qty);
        return redirect()->back()->with('message', 'Item added to cart successfully.');
        //redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function getItems()
    {
    	$product_price = 0;
    	$user = Auth::user();
    	$items =  Cart::getContent();
    	$cartCount = Cart::getContent()->count();
    	foreach ($items as $item) {
    		$product_price += $item->price * $item->quantity;
    	}
        $delivery_charges = $product_price != 0 ? 200 : 0;
    	$total = $product_price + $delivery_charges;
    	return view('products.cart', compact(['user', 'items', 'cartCount', 'product_price', 'delivery_charges', 'total']));
    }

    public function removeItem($id = null)
    {
    	$items =  Cart::getContent();
    	if($id == null)
    	{
	    	Cart::clear();
	    }
	    else
	    {
	    	Cart::remove($id);
	    }
    	return $this->getItems();
    }

    public function checkout()
    {
        $user = Auth::user();
        $cartCount = Cart::getContent()->count();
        return view('products.checkout', compact(['user', 'cartCount',]));
    }

    public function place_order(request $request)
    {
        $product_price = 0;
        $delivery_charges = 200;
        $items = Cart::getContent();
        $total_items = '';
        foreach ($items as $item) {
            $product_price += $item->price * $item->quantity;
            $total_items .= $item->id . '=' . $item->quantity . ',';
        }
        $total = $product_price + $delivery_charges;
        $order = new Order;
        $order->name = $request->name;
        $order->phone_no = $request->phone_no;
        $order->address = $request->address;
        $order->items = $total_items;
        $order->net_payable = $total;
        $order->status = 'pending';
        Auth::check() ? $order->user_id = Auth::user()->id : $order->user_id = null;
        $order->save();
        Cart::clear();
        if(Auth::check())
        {
            $update = User::find(Auth::user()->id);
            $update->balance = $update->balance - 200;
            $update->save();
        }
        return redirect()->back()->with('message', 'Order has been placed successfully.')->with('order_id', Order::max('id'));
    }

    public function test()
    {
        $order = Order::where('id', 2)->first();
        dd(unserialize($order->items));
    }
}
