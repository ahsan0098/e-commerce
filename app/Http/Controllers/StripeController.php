<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return "checked";
        //     $amount = rand(10, 999);
        //     \Stripe\Stripe::setApiKey('sk_test_51MbwtGGf5l94IQRWngnyr2gPz9ZORdUmNXqrTPcVX1ah0OYZI40oJBp0wbGIUgmDTBQCtr04Ya50dGb2IYHnzQLm00KdBNg2Fu');

        //     $intent = \Stripe\PaymentIntent::create([
        //         'amount' => ($amount) * 100,
        //         'currency' => 'INR',
        //         'metadata' => ['integration_check' => 'accept_a_payment']
        //     ]);

        //     $data = array(
        //         'name' => 'Sandeep',
        //         'email' => 'email@gmail.com',
        //         'amount' => $amount,
        //         'client_secret' => $intent->client_secret,
        //     );

        //     return view('stripe', ['data' => $data]);
        // }

        // public function success()
        // {
        //     return view('success');
    }
}
