<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'medicine_id',
        'order_id',
        'quantity',

    ];

    public function order(){
    {
        return $this->belongsTo(Order::class);
    }
}

public function medicine(){
    {
        return $this->belongsTo(Medicine::class);
    }
}}
