<?php

namespace App\Models;

use App\Events\OrderCreated;
use App\Events\OrderUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are not assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::created(function ($user) {
            event(new OrderCreated($user));
        });

        static::updated(function ($user) {
            event(new OrderUpdated($user));
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,"order_product","order_id","product_id");
    }

    public function payment()
    {
        return $this->hasOne(UserPayment::class);
    }
}
