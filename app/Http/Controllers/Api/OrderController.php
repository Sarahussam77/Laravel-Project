<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $orders = Order::all();
        return OrderResource::collection($orders);
        // return OrderResource::collection($orders);
        // $userId = Auth::user()->id
        // $userAddresses = Address::where('user_id','1')->first();
        // return $userAddresses;
    }
    function show($order){

        $order = Order::find($order);
        if($order) {
            return new OrderResource($order);
        }
        else{
            return 'order not found';
        }
    }
    function store(StoreOrderRequest $request){
        $data = $request->all();
        $order= Order::create([
            'is_insured'=>$data['is_insured'],
            'medicine.*'=>$data['medicine'],
            'user_id'=>$data['user_id'],
            'user_address_id'=>$data['user_address_id'],
            'pharmacy_id'=>$data['pharmacy_id'],
            'status'=>$data['status'],
            'creator_type'=>'client',

        ]);

        return new OrderResource($order);
    }
    function update(StoreOrderRequest $request , Order $order){

    }
}
