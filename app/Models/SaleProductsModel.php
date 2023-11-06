<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProductsModel extends Model
{
    use HasFactory;
    protected $table = 'sale_products';

    protected $fillable = [
        'id',
        'sale_id',
        'product_id',
        'qty',
        'unit_price',
        'total_amount',
        'variations',
        'total_discount_precentage',
        'total_discount',
        'is_active',
        'created_at',
        'updated_at'
    ];
}
