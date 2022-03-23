<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Crypt;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('public.payments.stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // return $request->input();
        $amount = (int)Crypt::decryptString($request->post('amount'));
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $result = Stripe\Charge::create ([
                "amount" => $amount*100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Test payment from Car Rental" 
        ]);
        //return $result;
        if($result){
             Session::flash('success', 'Payment successfull!');
        }
        
          
        // return back();
    }
}
