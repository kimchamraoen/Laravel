<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'phone'];
    public function cart(){
        return $this-> hasMany(cart::class);
    }
    public function wishlist(){
        return $this-> hasMany(wishlist::class);
    }
    public function payment(){
        return $this-> hasMany(payment::class);
    }
    public function order(){
        return $this-> hasMany(order::class);
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, cart::class, 'customer_id', 'id', 'id', 'product_id');
    }
}
