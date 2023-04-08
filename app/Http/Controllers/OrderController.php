<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderConfirmationMail;


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
            $Pharmacyname = $row->pharmacy?->type?->name;
            return $Pharmacyname;
        })
  
        ->addColumn('doctor', function($row){
            $doctorname =$row->doctor?->type?->name;
            return $doctorname;
        })
        ->addColumn('user', function($row){
           $username=$row->client?->type?->name;
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
    {   $totalprice=0;
        $data = $request->all();
        
        $DocId = User::all()->where('id' , $data['DocName'] )->first()->typeable_id;
        $PharmacyId = User::all()->where('id' , $data['PharmacyName'] )->first()->typeable_id;
    

        $useradd = $data['address'];
        
       
        $segments =Auth::User()->typeable_type;
        if(!$segments){
            $creator='admin';
        }
        elseif($segments=='app\\Models\\Doctor'){
            $creator='doctor';
        }
        else {
            $creator='pharmacy';
        }
        
        foreach($data['med'] as $key=>$value){
          
            $totalprice+=(Medicine::find($value)->price*$data['qty'][$key]??1);
        }
        $order = Order::Create([
            'status'=> $data['status'],
            'pharmacy_id'=> $PharmacyId,
            'user_id'=> $data['name_of_user'],
            'doctor_id'=> $DocId,
            'is_insured'=> $data['insured'],
            'creator_type'=>$creator,
            'user_address_id'=>$useradd,
            'price'=>$totalprice
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
         $medicine = Medicine::all();
         $medicineorder = MedicineOrder::all()->where('order_id','$id');
        return view('orders.show', [
            'order' => $order,
             'medicine' => $medicine,
             'medicineorder' => $medicineorder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order= Order::find($id);
        $users = Client::all();
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
        $UserId = User::all()->where('id' , $data['name_of_user'] )->first()->id;
        $DocId = User::all()->where('id' , $data['DocName'] )->first()->id;
        $PharmacyId = User::all()->where('id' , $data['PharmacyName'] )->first()->id;
        $useradd = Address::all()->where('id' , $data['address'] )->first()->id;
        $order = Order::findOrFail($id);
        
        $order->status =$data['status'];
        $order->pharmacy_id = $PharmacyId;
        $order->doctor_id = $DocId;
        $order->is_insured = $request->input('insured');
        $order->creator_type = $request->input('creator_type');
        $order->actions = "--";

        $order->save();
        return to_route('orders.index');

    }
    public function completeOrder(Request $request, string $id)
    {   $totalprice=0;
        
        $order = Order::find($id);
        $data = $request->all();
        foreach($data['med'] as $key=>$value){
          
            $totalprice+=(Medicine::find($value)->price*$data['qty'][$key]??1);
        }
        foreach($data['med'] as $key=>$value){
          
            MedicineOrder::create([
                'medicine_id'=>$value,
                'order_id'=>$id,
                'quantity'=>$data['qty'][$key]??1
                ]);
        }
        $order->price = $totalprice;
        $segments =Auth::User()->typeable_type;
        if($segments=='app\\Models\\Pharmacy'){
            $creator='pharmacy';
        }
        elseif($segments=='app\\Models\\Doctor'){
            $creator='doctor';
        }
        else {
            $creator='admin';
        }
        $order->creator_type=$creator;
        $order->save();
        
        $this->processOrder($id);
        
        return to_route('orders.index');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( String $id)
    {   MedicineOrder::where('order_id',$id)->delete();
        Order::findOrFail($id)->delete();
        
        return redirect()->route('orders.index')->with('success','Record deleted successfully');
    }

    public function ajaxGetShippingAddress(Request $request){
        $shippingAddress=Address::where('user_id',$request->id)->get();
        return view('orders.ajax_shipping_addresses',["shippingAddress"=>$shippingAddress]);
    } 

    public function processOrder(String $id){
        
        $order=Order::find($id);
        $medicine_order=MedicineOrder::where('order_id',$order->id)->get();
        $medicine_id=$medicine_order->pluck('medicine_id');
     
          foreach($medicine_id as $mid){
         
        $medicine[]=Medicine::where('id',$mid)->get();
      
          }
             
        Mail::to('sarahussam203@gmail.com')->send(new SendOrderConfirmationMail($order,$medicine));
        $order->status="Waiting For User Confirmation";
        $order->save();
        return view("Orders.index");

    }
    public function deliverOrder(Request $request){
        $order=Order::find($request['id']);
        $order->status="Delivered";
        $order->save();
        return view("Orders.index");

    }
    public function cancelOrder($id){
        $order=Order::find($id);
        $order->status="Cancelled";
        $order->save();
        return view("Orders.index");

    }
}