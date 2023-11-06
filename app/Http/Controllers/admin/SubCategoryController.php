<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\SubCatModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('sub_categories as sc')->select(
            'sc.*',
            'c.title as cat_name'
        )
            ->leftJoin('categories as c', 'c.id', '=', 'sc.category_id')
            ->get();
        return view('admin.sub_categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = CategoryModel::all();
        return view('admin.sub_categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'SubCatName' => 'required',
            'image_1' => 'required',
        ]);
        $image_1_path = null;
        $image_2_path = null;
        // dd($request->image_2);
        try {
            if ($request->file('image_1')) {
                $ext = pathinfo($request->image_1->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_1_name = time() . rand() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->SubCatName)) . '.' . $ext;
                // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_1_name, 'public');
                $file_path = $request->file('image_1')->move(public_path('uploads/sub_categories'), $image_1_name);
                $image_1_path = env('APP_URL') . "/uploads/sub_categories/" . $image_1_name;
            }
            if ($request->file('image_2')) {
                $ext = pathinfo($request->image_2->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_2_name = time() . rand() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->SubCatName)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                $file_path = $request->file('image_2')->move(public_path('uploads/sub_categories'), $image_2_name);
                $image_2_path = env('APP_URL') . "/uploads/sub_categories/" . $image_2_name;
            }
            // dd(preg_replace("/[^\w]+/", "-", strtolower($request->catName)));
            $res = SubCatModel::create([
                "category_id" => $request->cat_id,
                "title" => $request->SubCatName,
                "description" => $request->description,
                "image1_path" => $image_1_path,
                "image2_path" => $image_2_path,
                "is_active" => $request->status ? $request->status : 0,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->SubCatName)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ]);

            if ($res) {
                return redirect()->route('subcat.index')->with('success', 'Sub Category created successfully.');
            } else {
                return redirect()->route('subcat.index')->with('error', 'Sub Category creating failed.');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function show($id)
    {
        $sub_category = SubCatModel::where('id', $id)->first();
        $categories = CategoryModel::all();
        return view('admin.sub_categories.edit', compact('sub_category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'cat_id' => 'required',
            'SubCatName' => 'required',
            // 'image_1' => 'required',
        ]);
        $image_1_path = null;
        $image_2_path = null;

        try {
            $updateValues = [
                "title" => $request->SubCatName,
                "description" => $request->description,
                "is_active" => $request->status ? $request->status : 0,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->SubCatName)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ];

            if ($request->file('image_1')) {
                $ext = pathinfo($request->image_1->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_1_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->SubCatName)) . '.' . $ext;
                // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_1_name, 'public');
                $file_path = $request->file('image_1')->move(public_path('uploads/sub_categories'), $image_1_name);
                $image_1_path = env('APP_URL') . "/uploads/sub_categories/" . $image_1_name;
                $updateValues['image1_path'] = $image_1_path;
            }
            if ($request->file('image_2')) {
                $ext = pathinfo($request->image_2->getClientOriginalName(), PATHINFO_EXTENSION);
                if ($ext == null || $ext == '') {
                    $ext = 'jpeg';
                }
                $image_2_name = time() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->SubCatName)) . '.' . $ext;
                // $file_path = $request->file('image_2')->storeAs('uploads/categories', $image_2_name, 'public');
                $file_path = $request->file('image_2')->move(public_path('uploads/sub_categories'), $image_2_name);
                $image_2_path = env('APP_URL') . "/uploads/sub_categories/" . $image_2_name;
                $updateValues['image2_path'] = $image_2_path;
            }
            $result = SubCatModel::where('id', $id)
                ->update($updateValues);

            if ($result) {
                return redirect()->route('subcat.index')->with('success', 'Sub Category updated successfully.');
            } else {
                return redirect()->route('subcat.index')->with('error', 'Sub Category updated faild.');
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
            $result = SubCatModel::where('id', $id)->delete();
            if ($result) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Sub Category Deleted',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Sub Category Delete Failed',
                    ],
                    200
                );
            }
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() === '23000') {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'This sub category is already in use. Cannot Delete',
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
