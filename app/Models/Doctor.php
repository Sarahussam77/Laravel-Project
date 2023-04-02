<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Traits\HasRoles;

class Doctor extends Model
{
    use HasFactory;
    // use HasRoles;
    protected $fillable = [
        'id',
        "pharmacy_id",
        'is_baned'
    ];
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'doctor_id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'doctor_id');
    }

    public function all_user()
    {
        return $this->belongsTo(All_Users::class, 'id');
    }
}
