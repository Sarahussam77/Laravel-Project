<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        "pharmacy_id",
        'national_id',
         'avatar',
        'is_baned'
    ];
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }

    public function type()
    {
        return $this->morphOne('App\Models\User', 'typeable');
    }

}
