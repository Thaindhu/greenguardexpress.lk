<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleModel extends Model
{
    use HasFactory;
    protected $table = 'sales';

    protected $fillable = [
        'id',
        'invoice_number',
        'user_id',
        'user_type',
        'payment_type',
        'slip_path',
        'item_count',
        'total_amount',
        'total_discount_precentage',
        'total_discount',
        'paid_amount',
        'balance_amount',
        'referal_user_id',
        'referal_earn_amount',
        'deliver_type',
        'delivery_amount',
        'delivery_number',
        'delivery_link',
        'first_name',
        'last_name',
        'address_1',
        'address_2',
        'city_id',
        'email',
        'mobile_number',
        'postal_code',
        'status',
        'remark',
        'is_active',
        'is_verified',
        'is_otp_verified',
        'otp',
        'mpay_data',
        'created_at',
        'updated_at'
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'loc_id');
    }
}
