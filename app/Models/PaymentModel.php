<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'id',
        'user_id',
        'sale_id',
        'invoice_number',
        'payment_ref',
        'payment_currency',
        'payment_amount',
        'payment_method',
        'card_holder_name',
        'card_no',
        'card_ex_date',
        'status_msg',
        'created_at',
        'updated_at'
    ];
}
