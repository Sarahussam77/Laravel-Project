<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\Permission\Traits\HasRoles;


class Pharmacy extends Model
{
    use HasFactory;
    use SoftDeletes ;
    // use HasRoles;

    protected $fillable = [
        'id',
        'area_id',
        'priority',
    ];
    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'pharmacy_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'pharmacy_id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'pharmacy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
