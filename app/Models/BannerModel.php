<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = "banners";

    protected $fillable = [
        'id',
        'main_banner_path_1',
        'main_banner_1_redirect',
        'main_banner_path_2',
        'main_banner_2_redirect',
        'main_banner_path_3',
        'main_banner_3_redirect',
        'banner_image_sm_1',
        'banner_image_sm_1_redirect',
        'banner_image_sm_2',
        'banner_image_sm_2_redirect',
        'banner_image_sm_3',
        'banner_image_sm_3_redirect',
        'middle_banner_lg_1',
        'middle_banner_lg_1_redirect',
        'middle_banner_lg_2',
        'middle_banner_lg_2_redirect',
        'middle_banner_sm_1',
        'middle_banner_sm_1_redirect',
        'middle_banner_sm_2',
        'middle_banner_sm_2_redirect',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];
}
