<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use HasFactory;
    protected $table = 'general_settings';

    protected $fillable = [
        'id', 'free_deliver_total', 'is_active_free_deliver', 'ref_default_dis'
    ];
}
