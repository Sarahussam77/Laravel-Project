<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Prescription;
use App\Models\Address;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;


class OrderController extends Controller
{
    function index(){

        $orders = Order::where('user_id','1')->first();
        return $orders;
        // return OrderResource::collection($orders);
        // $userId = Auth::user()->id
        // $userAddresses = Address::where('user_id','1')->first();
        // return $userAddresses;
    }
    function show(Order $order){

        return new OrderResource($order);
    }
    function store(StoreOrderRequest $request){

    }
    function update(StoreOrderRequest $request , Order $order){

    }

}
