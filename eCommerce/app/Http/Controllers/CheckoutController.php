<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $user = new User;
       $product = Product::find($request->input('product_id'));
       $stripeEmail = $request->input('stripeEmail');
       $stripeToken = $request->input('stripeToken');
       $stripeTokenType = $request->input('stripeTokenType');

       if($user->charge($product->priceToCents(), ['sorce'=>$stripeToken, 'receipt_email' => $stripeEmail]));

       $order = new Order();

       $order->order_number = substr(md5(microtime()), rand(0,26),3) . time();

       $order->product_id = $product->id;
      
       $order->email = $request->input('stripeEmail');
       $order->billing_name = $request->input('stripeBillingName');
       $order->billing_address = $request->input('stripeBillingAddressLine1');
       $order->billing_city = $request->input('stripeBillingAddressCity');
       $order->billing_state = $request->input('stripeBillingAddressState');
       $order->billing_zip = $request->input('stripeBillingAddressZip');
       $order->billing_country = $request->input('stripeBillingAddressLine1');
       $order->shipping_name = $request->input('stripeShippingName');
       $order->shipping_address = $request->input('stripeShippingShippingAddressLine1');
       $order->shipping_city= $request->input('stripeShippingShippingAddressCity');
       $order->shipping_state= $request->input('stripeShippingShippingAddressState');
       $order->shipping_zip= $request->input('stripeShippingShippingAddressZip');
       $order->shipping_country= $request->input('stripeShippingShippingAddressCountry');
       $order->save();

       if($order->product->is_downloadable){
        $order->onetimeurl = md5(time() . $order->email . $order->order_number);
        $order->save();
        $data = ['order' => $order];

        \Mail::send('emails.download', $data, function($message) use ($data) 
        {
            $message->from(env('MAIL_FROM'));
            $message->to($data['order']->email, $data['order']->billing_name);
            $message->subject('WeDelawns.com Download Instrictions');

        });
       } else {

        return \Redirect::route('products.dhow', [$product->id]->with('message', 'There was a problem completing your order.'));

       }
return \Redirect::route('checkout.thankyou')->with('message', 'Thank you for your otder.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
