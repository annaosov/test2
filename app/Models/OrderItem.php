<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'order_id',
        'price',
        'quantity',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
