<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class StripePaymentIntentController extends Controller
{
    public function create(Request $request){

        $amount = $request->amount;
        $totalAmountInCents = $amount * 100;
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            $intent = PaymentIntent::create([
                'amount' => $totalAmountInCents,
                'currency' => 'usd', // Change this to your preferred currency
            ]);
            return response()->json(['clientSecret' => $intent->client_secret]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }
}
