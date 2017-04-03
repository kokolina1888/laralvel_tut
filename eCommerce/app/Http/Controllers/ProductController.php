<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

class ProductController extends Controller
{
    public function index()
    {
    	
    	$products = Product::orderBy('name', 'asc')->get();
    	return view('product.index', compact('products'));
    }

    public function show($id)
    {
    	$product = Product::findOrFail($id);
    	return view('product.show', compact('product'));
    }

    public function download($id)
    {
        $order = Order::where('onetimeurl', $id)->$first();

        if($order){
            $product =$order->product;
            $order->onetimeurl = '';
            $order->save();

            return response()->download(storage_path() . '/downloads/' . $product->download);
        } else {
            abort(401, 'Access denied'); 
        }
    }
}
