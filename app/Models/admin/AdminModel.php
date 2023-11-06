<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'admins';

    protected $fillable = [
        'id', 'name', 'email', 'user_type_id', 'status', 'password', 'created_at', 'updated_at'
    ];
}
