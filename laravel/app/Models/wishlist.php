<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id'];
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
