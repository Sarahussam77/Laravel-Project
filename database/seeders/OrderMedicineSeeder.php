<?php

namespace Database\Seeders;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $medicines = Medicine::all();

        foreach ($orders as $order) {
            $order->medicines()->attach($medicines->random(rand(1, 3))->pluck('id'));
        }
    }
}
