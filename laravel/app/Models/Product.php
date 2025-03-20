<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['name', 'price', 'category_id', 'description', 'images'];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart()
    {
        return $this->hasMany(cart::class);
    }
    public function wishlist()
    {
        return $this->hasMany(wishlist::class);
    }
    public function orderProducts() 
{
    return $this->hasMany(OrderProduct::class);
}

}