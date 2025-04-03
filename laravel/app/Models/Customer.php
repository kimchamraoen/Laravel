<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers'; // Add this line

    protected $fillable = ['name', 'email', 'address', 'phone'];

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Cart::class, 'customer_id', 'id', 'id', 'product_id');
    }
}
