<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'id', 
        'product_code', 
        'category_id', 
        'sub_category_id', 
        'brand_id', 
        'title', 
        'small_description', 
        'description', 
        'image1_path', 
        'image2_path', 
        'image3_path', 
        'image4_path', 
        'variations', 
        'review_count', 
        'review_value', 
        'price', 
        'discount_price', 
        'discount_pre', 
        'stock', 
        'max_order_qty', 
        'weight', 
        'is_active', 
        'is_available', 
        'is_featured', 
        'is_new', 
        'is_hot_sell', 
        'metaname', 
        'created_at', 
        'updated_at'
    ];
}
