<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Token;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function makePayment(Request $request){
        // Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys


        return $cartItems = $request->input('cartItems');
        \Stripe\Stripe::setApiKey('sk_test_51HTQxNLvujkiiWhM3qtdjSi9dlCopxS8gGY5HqRn3ZpP5xTeWG5pd8oms60Z4W0ysQm1QKaTDKDiKGi1vurQHYcF00vuYTv19J');

        $token = \Stripe\Token::create([
            'card' => [
                'number' => $request->input('cardNumber'),
                'exp_month' => $request->input('expiryMonth'),
                'exp_year' => $request->input('expiryYear'),
                'cvc' => $request->input('cvcNumber')
            ]
        ]);

        $charge = \Stripe\Charge::create([
            'amount' => 1000,
            'currency' => 'usd',
            'source' => $token,
            'receipt_email' => $request->input('email'),
        ]);

        return $charge;

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
