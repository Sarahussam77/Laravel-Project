<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\DataTables\OrdersDataTable;
use App\Models\Address;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\MedicineOrder;
use App\Models\Pharmacy;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

use Phar;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
	
   public function index(Request $request)
   {  
     if ($request->ajax()) {
       $data = Order::select('id','user_id','doctor_id','pharmacy_id','status' , 'is_insured', 'price')->get();
       return Datatables::of($data)->addIndexColumn()
       ->addColumn('action', function ($row) {
        $button = '<a name="show" id="'.$row->id.'" class="show btn btn-success btn-sm p-0" href="'.route('orders.show', $row->id).'" style="border-radius: 20px;"><i class="fas fa-eye m-2"></i></a>';
        $button .= '<a name="edit" id="'.$row->id.'" class="edit btn btn-primary btn-sm p-0" href="'.route('orders.edit', $row->id).'" style="border-radius: 20px;"><i class="fas fa-edit m-2"></i></a>';
        $button .= '<form method="post" action= "'.route('orders.destroy', $row->id).'">
    <input type="hidden" name="_token" value="'. csrf_token().' ">
    <input type="hidden" name="_method" value="delete">
    <button type="submit" class="btn btn-danger btn-sm  p-0 ml-3" style="border-radius: 20px;"><i class="fas fa-trash m-2"></i>
    </button>
    </form>';
        return $button;
        ;
    })

        ->addColumn('Pharmacy', function($row){
            $Pharmacyname = Pharmacy::find($row['pharmacy_id'] )->first()->type->name;
            return $Pharmacyname;
        })
        ->addColumn('doctor', function($row){
            $doctorname = Doctor::find($row['doctor_id'] )->first()->type->name;
            return $doctorname;
        })
        ->addColumn('user', function($row){
            $username = Client::find($row['user_id'] )->first()->type->name;
            return $username;
        })
           ->rawColumns(['action'])
           ->make(true);
   }
        return view("Orders.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Client::all();
        $doctors = Doctor::all();
        $medicine = Medicine::all();
        $pharmacy = Pharmacy::all();
       
        return view("Orders.create",[
        'medicine'=>$medicine ,
        'pharmacy'=>$pharmacy ,
        'doctors'=>$doctors,
        
        'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $DocId = User::all()->where('name' , $data['DocName'] )->first()->typeable_id;
        $PharmacyId = User::all()->where('name' , $data['PharmacyName'] )->first()->typeable_id;
        $useradd = Address::all()->where('street_name' , $data['address'] )->first()->id;
       
        $segments =Auth::User()->typeable_type;
        if($segments=="null"){
            $creator='admin';
        }
        elseif($segments=='app\\Models\\Doctor'){
            $creator='doctor';
        }
        else {
            $creator='pharmacy';
        }
        $order = Order::Create([
            'status'=> $data['status'],
            'pharmacy_id'=> $PharmacyId,
            'user_id'=> $data['name_of_user'],
            'doctor_id'=> $DocId,
            'is_insured'=> $data['insured'],
            'creator_type'=>$creator,
            'user_address_id'=>$useradd,
            'price'=>Medicine::find($data['med'])[0]->price
        ]);
        foreach($data['med'] as $key=>$value){
          
            MedicineOrder::create([
                'medicine_id'=>$value,
                'order_id'=>$order->id,
                'quantity'=>$data['qty'][$key]??1
                ]);
        }
       
        

        return to_route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order= Order::find($id);
        $user = User::all();
        $medicine = Medicine::all();
        $pharmacy = Pharmacy::all();
        $doctor = Doctor::all();
        return view('orders.show', [
            'order' => $order,
            'user' => $user,
            'medicine' => $medicine,
            'pharmacy' => $pharmacy,
            'doctor' => $doctor,
    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order= Order::find($id);
        $users = User::all();
        $doctors = Doctor::all();
        $medicine = Medicine::all();
        $pharmacy = Pharmacy::all();
        $address = Address::all();

        return view("Orders.edit",[ 
            'order' => $order,
            'medicine'=>$medicine ,
            'users' => $users,
            'pharmacy'=>$pharmacy ,
            'doctors'=>$doctors,
            'address'=>$address,
    
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $UserId = User::all()->where('name' , $data['name_of_user'] )->first()->id;
        $DocId = User::all()->where('name' , $data['DocName'] )->first()->id;
        $PharmacyId = User::all()->where('name' , $data['PharmacyName'] )->first()->id;
        $useradd = Address::all()->where('street_name' , $data['address'] )->first()->id;
        $order = Order::findOrFail($id);
        
        $order->status =$data['status'];
        $order->pharmacy_id = $PharmacyId;
        $order->user_id = $UserId;
        $order->doctor_id = $DocId;
        $order->is_insured = $request->input('insured');
        $order->creator_type = $request->input('creator_type');
        $order->user_address_id = $useradd;
        $order->actions = "--";

        $order->save();
        return to_route('orders.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( String $id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->route('orders.index')->with('success','Record deleted successfully');
    }

    public function ajaxGetShippingAddress(Request $request){
        $shippingAddress=Address::where('user_id',$request->id)->get();
        return view('orders.ajax_shipping_addresses',["shippingAddress"=>$shippingAddress]);
    } 
}
