<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory;
    

    protected $fillable = ['customer_id', 'total_price','order_date'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
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
