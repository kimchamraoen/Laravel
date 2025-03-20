<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'total_price','order_date'];
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function payment()
    {
        return $this->hasMany(payment::class);
    }

    protected $table = 'orders';
    public function orderDate(): Attribute
    {
        return Attribute::make(
            //Mutator: Convert input format to Mysql format before saving
            set: fn ($value) => Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d H:i:s'),

            //Accessor: Convert databse format to user format when retriening 
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y H:i:s')
        );
    }

    #Use soft delete
    use SoftDeletes;
    protected $dates = ['deleted_at']; //Ensure that deleted_at is a date

}
