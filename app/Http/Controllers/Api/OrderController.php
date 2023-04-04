<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $UserId = User::all()->where('name' , $data['name_of_user'] )->first()->id;
    //     $DocId = User::all()->where('name' , $data['DocName'] )->first()->id;
    //     $PharmacyId = User::all()->where('name' , $data['PharmacyName'] )->first()->id;
    //     $useradd = Address::all()->where('street_name' , $data['address'] )->first()->id;
    //     // dd($data);
    //     $med = $data['med'];
    //     $qty = $data['qty'];
        
    //     $order = Order::Create([
    //         'status'=> $data['status'],
    //         'pharmacy_id'=> $PharmacyId,
    //         'user_id'=> $UserId,
    //         'doctor_id'=> $DocId,
    //         'is_insured'=> $data['insured'],
    //         'creator_type'=>$data['creator_type'],
    //         'user_address_id'=>$useradd,
    //         'actions' => '--'
    //     ]);



    //     return to_route('orders.index');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     $order= Order::find($id);
    //     $user = User::all();
    //     $medicine = Medicine::all();
    //     $pharmacy = Pharmacy::all();
    //     $doctor = Doctor::all();
    //     return view('orders.show', [
    //         'order' => $order,
    //         'user' => $user,
    //         'medicine' => $medicine,
    //         'pharmacy' => $pharmacy,
    //         'doctor' => $doctor,
    
    //     ]);
    // }

    // public function update(Request $request, string $id)
    // {
    //     $data = $request->all();
    //     $UserId = User::all()->where('name' , $data['name_of_user'] )->first()->id;
    //     $DocId = User::all()->where('name' , $data['DocName'] )->first()->id;
    //     $PharmacyId = User::all()->where('name' , $data['PharmacyName'] )->first()->id;
    //     $useradd = Address::all()->where('street_name' , $data['address'] )->first()->id;
    //     $order = Order::findOrFail($id);
        
    //     $order->status =$data['status'];
    //     $order->pharmacy_id = $PharmacyId;
    //     $order->user_id = $UserId;
    //     $order->doctor_id = $DocId;
    //     $order->is_insured = $request->input('insured');
    //     $order->creator_type = $request->input('creator_type');
    //     $order->user_address_id = $useradd;
    //     $order->actions = "--";

    //     $order->save();
    //     return to_route('orders.index');

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy( String $id)
    // {
    //     Order::findOrFail($id)->delete();
    //     return redirect()->route('orders.index')->with('success','Record deleted successfully');
    // }
}
