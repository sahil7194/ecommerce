<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    /** @use HasFactory<\Database\Factories\VendorFactory> */
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are not assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
