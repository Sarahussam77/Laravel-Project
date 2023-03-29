<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_address_id',
        'doctor_id',
        'pharmacy_id',
        'status',
        'actions',
        'is_insured',
        'creator_type',
        'price',
    ];
}
