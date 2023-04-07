<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Medicine;
use App\Models\MedicineOrder;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderConfirmationMail;
use Auth;

class ScanNewOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:new-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan for new orders created within the last minute';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $newOrders=Order::where('status','New')->get();
        $pharmacies=Pharmacy::all();
        foreach($newOrders as $order){
            $highestPriority= 0;
            foreach($pharmacies as $pharmacy){
                if($pharmacy->area_id==$order->address->area_id){
                    if($highestPriority<$pharmacy->priority){
                        $highestPriority= $pharmacy->priority; 
                        $order->update([ 
                            'status'=>'Processing',
                            'pharmacy_id'=> $pharmacy->id,
                            'doctor_id'=> $pharmacy->doctors->first()->id,
                        ]);
                    }
                }
            }
            $medicine_order=MedicineOrder::where('order_id',$order->id)->get();
          
        $medicine_id=$medicine_order->pluck('medicine_id');
    
          foreach($medicine_id as $id){
         
        $medicine[]=Medicine::where('id',$id)->get();
      
          }
          
        Mail::to('sarahussam203@gmail.com')->send(new SendOrderConfirmationMail($order,$medicine));
         $order->status="Waiting For User Confirmation";
         $order->save();
        }
        info('every_minute');

    }
}
