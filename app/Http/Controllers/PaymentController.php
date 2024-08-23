<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        try {
            // Set Stripe API key
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create charge
            $charge = Charge::create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment description',
            ]);

            // Handle successful payment
            return response()->json(['message' => 'Payment successful'], 200);
        } catch (\Exception $e) {
            // Handle payment failure
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
