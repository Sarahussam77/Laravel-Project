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

    public function orders()
    {
        return $this->hasMany(Order::class, 'doctor_id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
