<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPayment extends Model
{
    /** @use HasFactory<\Database\Factories\UserPaymentFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are not assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
