<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Auth;
use App\Models\Prescription;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $orders = Order::all();
        return OrderResource::collection($orders);
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
    function store(Request $request){
        
        $data = $request->all();
        $order= Order::create([
            'is_insured'=>$data['is_insured'],
            'user_id'=>$data['user_id'],
            'user_address_id'=>$data['user_address_id'],
            'status'=>'NEW',
        ]);
        
        $pres=Prescription::create([
            'order_id'=>$order->id,
            'path'=>$request->file('image')->store('images',['disk' => "public"])
        ]);
            return 'success';
           
        return new OrderResource($order);
    }


    public function update(Request $request, $id)
    {
        $if_exist = Order::where('id', $id);
        if ($if_exist->count()>0) 
        {
            $data = $request->all();

            $if_exist->update([
                'is_insured'=>$data['is_insured'],
                'user_id'=>$data['user_id'],
                'user_address_id'=>$data['user_address_id'],
            ]);
            
            $pres=Prescription::where('order_id', $id);
            $pres->update([
                'path'=>$request->file('image')->store('images',['disk' => "public"])
            ]);

            return new OrderResource($if_exist);
        }
        else
        {
            return response()->json([
                "message" => "order not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order)
    {
        $if_exist = Order::where('id', $order);
        if ($if_exist->count()>0) {
            $if_exist->delete();
            return response()->json([
                'success' => 'Order deleted'
            ]);
        }
        else
        {
            return response()->json([
                "message" => "order not found"
            ], 404);
        }
    }
}

