<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = BannerModel::where('id', 1)->first();
        return view('admin.banners.main.index', compact('banners'));
    }
    public function index_sub()
    {
        $banners = BannerModel::where('id', 1)->first();
        return view('admin.banners.sub.index', compact('banners'));
    }

    public function edit()
    {
        $banner = BannerModel::where('id', 1)->first();
        return view('admin.banners.main.edit', compact('banner'));
    }
    public function edit_sub()
    {
        $banner = BannerModel::where('id', 1)->first();
        return view('admin.banners.sub.edit', compact('banner'));
    }

    public function update(Request $request)
    {
        try {
            if ($request->type == "main") {
                $updateValues = [
                    "main_banner_1_redirect" => $request->main_banner_1_redirect_to,
                    "main_banner_2_redirect" => $request->main_banner_2_redirect_to,
                    "main_banner_3_redirect" => $request->main_banner_3_redirect_to,
                    "banner_image_sm_1_redirect" => $request->main_banner_sm_1_redirect_to,
                    "banner_image_sm_2_redirect" => $request->main_banner_sm_2_redirect_to,
                    "banner_image_sm_3_redirect" => $request->main_banner_sm_3_redirect_to,
                    "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
                ];
            } else {
                $updateValues = [
                    "middle_banner_lg_1_redirect" => $request->middle_banner_lg_1_redirect,
                    "middle_banner_lg_2_redirect" => $request->middle_banner_lg_2_redirect,
                    "middle_banner_sm_1_redirect" => $request->middle_banner_sm_1_redirect,
                    "middle_banner_sm_2_redirect" => $request->middle_banner_sm_2_redirect,
                    "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                    "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
                ];
            }


            if ($request->file('main_banner_1')) {
                $ext = pathinfo($request->file('main_banner_1')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('main_banner_1')->move(public_path('uploads/banners/main/lg'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/main/lg/" . $image_name;
                $updateValues['main_banner_path_1'] = $image_url;
            }
            if ($request->file('main_banner_2')) {
                $ext = pathinfo($request->file('main_banner_2')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('main_banner_2')->move(public_path('uploads/banners/main/lg'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/main/lg/" . $image_name;
                $updateValues['main_banner_path_2'] = $image_url;
            }
            if ($request->file('main_banner_3')) {
                $ext = pathinfo($request->file('main_banner_3')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('main_banner_3')->move(public_path('uploads/banners/main/lg'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/main/lg/" . $image_name;
                $updateValues['main_banner_path_3'] = $image_url;
            }
            if ($request->file('sub_banner_1')) {
                $ext = pathinfo($request->file('sub_banner_1')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('sub_banner_1')->move(public_path('uploads/banners/main/sm'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/main/sm/" . $image_name;
                $updateValues['banner_image_sm_1'] = $image_url;
            }
            if ($request->file('sub_banner_2')) {
                $ext = pathinfo($request->file('sub_banner_2')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('sub_banner_2')->move(public_path('uploads/banners/main/sm'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/main/sm/" . $image_name;
                $updateValues['banner_image_sm_2'] = $image_url;
            }
            if ($request->file('sub_banner_3')) {
                $ext = pathinfo($request->file('sub_banner_3')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('sub_banner_3')->move(public_path('uploads/banners/main/sm'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/main/sm/" . $image_name;
                $updateValues['banner_image_sm_3'] = $image_url;
            }

            if ($request->file('middle_banner_lg_1')) {
                $ext = pathinfo($request->file('middle_banner_lg_1')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('middle_banner_lg_1')->move(public_path('uploads/banners/middle/lg'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/middle/lg/" . $image_name;
                $updateValues['middle_banner_lg_1'] = $image_url;
            }
            if ($request->file('middle_banner_lg_2')) {
                $ext = pathinfo($request->file('middle_banner_lg_2')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('middle_banner_lg_2')->move(public_path('uploads/banners/middle/lg'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/middle/lg/" . $image_name;
                $updateValues['middle_banner_lg_2'] = $image_url;
            }
            if ($request->file('middle_banner_sm_1')) {
                $ext = pathinfo($request->file('middle_banner_sm_1')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('middle_banner_sm_1')->move(public_path('uploads/banners/middle/sm'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/middle/sm/" . $image_name;
                $updateValues['middle_banner_sm_1'] = $image_url;
            }
            if ($request->file('middle_banner_sm_2')) {
                $ext = pathinfo($request->file('middle_banner_sm_2')->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_name = time() . rand() . '-' . 'main-slider' . '.' . $ext;
                $file_path = $request->file('middle_banner_sm_2')->move(public_path('uploads/banners/middle/sm'), $image_name);
                $image_url = env('APP_URL') . "/uploads/banners/middle/sm/" . $image_name;
                $updateValues['middle_banner_sm_2'] = $image_url;
            }
            $res = BannerModel::updateOrCreate(
                ['id' => 1],
                $updateValues
            );

            if ($res) {
                if ($request->type == "main") {
                    return redirect()->route('main_banner.index')->with('success', 'Banners Update successfully.');
                } else {
                    return redirect()->route('sub_banner.index')->with('success', 'Banners Update successfully.');
                }
            } else {
                if ($request->type == "main") {
                    return redirect()->route('main_banner.index')->with('error', 'Banners Updating failed.');
                } else {
                    return redirect()->route('sub_banner.index')->with('error', 'Banners Updating failed.');
                }
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
