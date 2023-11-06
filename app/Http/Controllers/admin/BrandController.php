<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = BrandModel::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
        ]);
        $image_1_path = null;
        $image_2_path = null;

        try {
            if ($request->file('image_1')) {
                $ext = pathinfo($request->image_1->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_1_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->brand)) . '.' . $ext;
                // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_1_name, 'public');
                $file_path = $request->file('image_1')->move(public_path('uploads/brands'), $image_1_name);
                $image_1_path = env('APP_URL') . "/uploads/brands/" . $image_1_name;
            }
            if ($request->file('image_2')) {
                $ext = pathinfo($request->image_2->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_2_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->brand)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                $file_path = $request->file('image_2')->move(public_path('uploads/brands'), $image_2_name);
                $image_2_path = env('APP_URL') . "/uploads/brands/" . $image_2_name;
            }
            // dd(preg_replace("/[^\w]+/", "-", strtolower($request->brand)));
            $res = BrandModel::create([
                "title" => $request->brand,
                "description" => $request->description,
                "image1_path" => $image_1_path,
                "image2_path" => $image_2_path,
                "is_active" => $request->status ? $request->status : 0,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->brand)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ]);

            if ($res) {
                return redirect()->route('brand.index')->with('success', 'Brand created successfully.');
            } else {
                return redirect()->route('brand.index')->with('error', 'Brand creating faild.');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function show($id)
    {
        $brand = BrandModel::where('id', $id)->first();
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'brand' => 'required',
            // 'image_1' => 'required',
        ]);
        $image_1_path = null;
        $image_2_path = null;

        try {
            $updateValues = [
                "title" => $request->brand,
                "description" => $request->description,
                "is_active" => $request->status ? $request->status : 0,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->brand)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ];

            if ($request->file('image_1')) {
                $ext = pathinfo($request->image_1->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_1_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->brand)) . '.' . $ext;
                // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_1_name, 'public');
                $file_path = $request->file('image_1')->move(public_path('uploads/categories'), $image_1_name);
                $image_1_path = env('APP_URL') . "/uploads/categories/" . $image_1_name;
                $updateValues['image1_path'] = $image_1_path;
            }
            if ($request->file('image_2')) {
                $ext = pathinfo($request->image_2->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_2_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->brand)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                $file_path = $request->file('image_2')->move(public_path('uploads/categories'), $image_2_name);
                $image_2_path = env('APP_URL') . "/uploads/categories/" . $image_2_name;
                $updateValues['image2_path'] = $image_2_path;
            }

            $result = BrandModel::where('id', $id)
                ->update($updateValues);

            if ($result) {
                return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
            } else {
                return redirect()->route('brand.index')->with('error', 'Brand updated faild.');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function delete($id)
    {
        // return 'Working';
        // dd($id);

        try {
            $result = BrandModel::where('id', $id)->delete();
            if ($result) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Brand Deleted',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Brand Delete Failed',
                    ],
                    200
                );
            }
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() === '23000') {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'This Brand is already in use. Cannot Delete',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => $e->getMessage(),
                    ],
                    200
                );
            }
        }
    }
}
