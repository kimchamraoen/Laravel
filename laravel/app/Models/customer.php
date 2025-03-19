<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address', 'phone'];
    public function cart(){
        return $this-> hasMany(Cart::class);
    }
    public function wishlist(){
        return $this-> hasMany(Wishlist::class);
    }
    public function payment(){
        return $this-> hasMany(Payment::class);
    }
    public function order(){
        return $this-> hasMany(Order::class);
    }
    public function product()
    {
        return $this->hasManyThrough(Product::class, Cart::class, 'customer_id', 'id', 'id', 'product_id');
    }
}
