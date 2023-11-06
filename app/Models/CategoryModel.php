<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'id', 'title', 'description', 'image1_path', 'image2_path','icon_path', 'is_active' , 'is_hot', 'is_collection', 'metaname', 'created_at', 'updated_at'
    ];
}
