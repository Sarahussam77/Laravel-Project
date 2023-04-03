<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\Order;
use App\Models\Pharmacy;
use Illuminate\Console\Command;

class AssignOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $orders = Order::whereNull('pharmacy_id')->get();
    
        foreach ($orders as $order) {
            $order->pharmacy_id = Pharmacy::where(
                'area_id', Address::find($order->user_address_id)->area_id)
                ->orderby('priority')
                ->first()
                ->id;
            $order->save();
    }
    }
}
