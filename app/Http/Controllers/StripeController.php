<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;

use Session;


class StripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stripe($id)
    {   $order=Order::find($id);
        $user = auth()->user();
        return view('stripe', [
            'intent' => $user->createSetupIntent(),
        'order' => $order]);
    }

    public function stripePost(Request $request,$id)
    {   $order=Order::find($id);
        $order->status="paid";
        $order->save();
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