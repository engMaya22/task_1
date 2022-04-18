<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function stripePost(Request $request)
    {//WE NEED VALID DATA OF USERINFO FROM BACK AS VALID FROM FRONT IN CART
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => 100 * 100,
               "currency" => "usd",
               "source" => $request->stripeToken,
               "description" => "Test payment from itsolutionstuff.com." 

        ]);

  
       Session::flash('success', 'Payment successful!');
       return back();
       
      
       
       
        }

       
}
