<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Client extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'date_of_birth',
        'gender',
        'phone',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, "user_id");
    }

    public function orders()
    {
        return $this->hasMany(Order::class, "user_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

