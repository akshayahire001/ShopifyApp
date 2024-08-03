<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorStore extends Model
{
    use HasFactory;
    protected $table='vendors_store';
    protected $fillable = ['vendor_id','store_name','access_token'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
}
