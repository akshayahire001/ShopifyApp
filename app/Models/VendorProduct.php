<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;
    protected $table='vendors_product';

    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
}
