<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function singleCharge(Request $request)
    {
        $amount = $request ->amount;
       // $amount = $amount * 100; //still dollars
        $paymentMethod = $request ->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        $paymentMethod = $user->addPaymentMethod($paymentMethod);

        $user->charge($amount,$paymentMethod->id);

        Session::flash('success', 'Payment has been successfully');

        return to_route('home');


    }
}
