<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCatModel extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    protected $fillable = [
        'id', 'category_id', 'title', 'description', 'image1_path', 'image2_path', 'is_active', 'metaname', 'created_at', 'updated_at'
    ];
}
