<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryModel::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'catName' => 'required',
            'image_1' => 'required',
        ]);
        $image_1_path = null;
        $image_2_path = null;
        $icon = null;

        try {
            if ($request->file('image_1')) {
                $ext = pathinfo($request->image_1->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_1_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->catName)) . '.' . $ext;
                // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_1_name, 'public');
                $file_path = $request->file('image_1')->move(public_path('uploads/categories'), $image_1_name);
                $image_1_path = env('APP_URL') . "/uploads/categories/" . $image_1_name;
            }
            if ($request->file('image_2')) {
                $ext = pathinfo($request->image_2->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_2_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->catName)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                $file_path = $request->file('image_2')->move(public_path('uploads/categories'), $image_2_name);
                $image_2_path = env('APP_URL') . "/uploads/categories/" . $image_2_name;
            }
            if ($request->file('icon')) {
                $ext = pathinfo($request->icon->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'png';
                }
                $icon_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->catName)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $icon_name, 'public');
                $file_path = $request->file('icon')->move(public_path('uploads/categories/icons'), $icon_name);
                $icon = env('APP_URL') . "/uploads/categories/icons/" . $icon_name;
            }
            // dd(preg_replace("/[^\w]+/", "-", strtolower($request->catName)));
            $res = CategoryModel::create([
                "title" => $request->catName,
                "description" => $request->description,
                "image1_path" => $image_1_path,
                "image2_path" => $image_2_path,
                "icon_path" => $icon,
                "is_active" => $request->status ? $request->status : 0,
                "is_hot" => $request->is_hot,
                "is_collection" => $request->is_collection,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->catName)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ]);

            if ($res) {
                return redirect()->route('proCategory.index')->with('success', 'Category created successfully.');
            } else {
                return redirect()->route('proCategory.index')->with('error', 'Category creating faild.');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function show($id)
    {
        $category = CategoryModel::where('id', $id)->first();
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'catName' => 'required',
            // 'image_1' => 'required',
        ]);
        $image_1_path = null;
        $image_2_path = null;

        try {
            $updateValues = [
                "title" => $request->catName,
                "description" => $request->description,
                "is_active" => $request->status ? $request->status : 0,
                "is_hot" => $request->is_hot,
                "is_collection" => $request->is_collection,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->catName)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ];

            if ($request->file('image_1')) {
                $ext = pathinfo($request->image_1->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_1_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->catName)) . '.' . $ext;
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
                $image_2_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->catName)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                $file_path = $request->file('image_2')->move(public_path('uploads/categories'), $image_2_name);
                $image_2_path = env('APP_URL') . "/uploads/categories/" . $image_2_name;
                $updateValues['image2_path'] = $image_2_path;
            }
            if ($request->file('icon')) {
                $ext = pathinfo($request->icon->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'png';
                }
                $icon_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->catName)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $icon_name, 'public');
                $file_path = $request->file('icon')->move(public_path('uploads/categories/icons'), $icon_name);
                $icon = env('APP_URL') . "/uploads/categories/icons/" . $icon_name;
                $updateValues['icon_path'] = $icon;
            }

            $result = CategoryModel::where('id', $id)
                ->update($updateValues);

            if ($result) {
                return redirect()->route('proCategory.index')->with('success', 'Category updated successfully.');
            } else {
                return redirect()->route('proCategory.index')->with('error', 'Category updated faild.');
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
            $result = CategoryModel::where('id', $id)->delete();
            if ($result) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Category Deleted',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Category Delete Failed',
                    ],
                    200
                );
            }
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() === '23000') {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'This category is already in use. Cannot Delete',
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

    public function category_order()
    {
        $cats = CategoryModel::orderBy('cat_order', 'asc')->get();
        return view('admin.categories.cat_order', compact('cats'));
    }
    public function category_order_set(Request $request)
    {
        // return response()->json(
        //     [
        //         'status' => true,
        //         'message' => 'Order updated',
        //         'data' => $request->cat_order
        //     ],
        //     200
        // );

        try {
            foreach ($request->cat_order as $key => $value) {
                $res = CategoryModel::where('id', $value['cat_id'])
                    ->update([
                        "cat_order" => $value['order_id']
                    ]);
            }
            if ($res) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Order updated',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Order updating Failed',
                    ],
                    200
                );
            }
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status' => false,
                    'message' => $th->getMessage(),
                ],
                200
            );
        }
    }
}
