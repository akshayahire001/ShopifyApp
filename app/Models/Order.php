<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order_master';

    public function order_products()
    {
        return $this->hasMany(OrderProducts::class, 'order_id');
    }

    public function billing_address()
    {
        return $this->hasOne(BillingAddress::class, 'order_id');
    }

    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class, 'order_id');
    }

    public function customer_master()
    {
        return $this->hasOne(Customer::class, 'order_id');
    }
}
