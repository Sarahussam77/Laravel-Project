<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AssignNewOrderToPharmacy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         $orders = Order::where('status', 'NEW')->get();
         
        foreach ($orders as $order) {
            $order->status = 'processing';
         $orderArea = $order->client->addresses()->where('is_main', 1)->first()->area_id;
         
           $order->pharmacy_id = Pharmacy::where('area_id', $orderArea)->orderBy('priority', 'desc')->first()->id ?? 1;
            
             $order->save();

       }
    }
}
