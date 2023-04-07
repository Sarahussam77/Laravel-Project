<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

use Session;


class StripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stripe()
    {
        $user = auth()->user();
        return view('stripe', [
            'intent' => $user->createSetupIntent(),
        ]);
    }

    public function stripePost(Request $request)
    {
        $amount = $request->amount;
        $paymentMathod = $request->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        $paymentMathod = $user->addPaymentMethod($paymentMathod);

        $user->charge($amount, $paymentMathod->id);

        Session::flash('success', 'Payment has been successfully');
        return to_route('stripe');
    }
}