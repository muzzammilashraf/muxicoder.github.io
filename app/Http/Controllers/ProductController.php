<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use DB;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $cartCount = Cart::getContent()->count();
        $products = Product::all(); 
        return view('products.index', compact(['user', 'cartCount', 'products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('products.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $product_id = Product::max('id') + 1;
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->user_id = $user->id;
        $product->dial_color = $request->dial_color;
        $product->chain_color = $request->chain_color;
        $product->description = $request->description;
        $product->category = $request->category;
        $request->file('display_image')->storeAs('images/products', $product_id.'_display.jpg', 'public');
        $request->file('description_image')->storeAs('images/products', $product_id.'_description.jpg', 'public');
        if($product->save())
        {
            return back()->with('success', 'Product Added Successfully');
        }
        else
        {
            return back()->with('error', 'Product Adding Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $cartCount = Cart::getContent()->count();
        $product = Product::where('id', $id)->first();
        $colors = Product::where('name', $product->name)->where('id', '<>', $id)->get();
        return view('products.detail', compact(['user', 'cartCount', 'product', 'colors']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function list()
    {
        $user = Auth::user();
        $list = DB::table('products')->get();
        return view('admin.products-list', compact(['user', 'list']));
    }
}
