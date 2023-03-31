<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pharmacy extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'password',
        'national_id',
        'email',
        'avatar_image',
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

}
