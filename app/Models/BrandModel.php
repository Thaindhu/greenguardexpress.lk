<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = [
        'id', 'title', 'description', 'image1_path', 'image2_path', 'is_active', 'metaname', 'created_at', 'updated_at'
    ];
}
