<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\SubCatModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products as p')->select(
            'p.*',
            'c.title as cat_name',
            'sc.title as subcat_name',
            'b.title as brand',
        )
            ->leftJoin('categories as c', 'c.id', '=', 'p.category_id')
            ->leftJoin('sub_categories as sc', 'sc.id', '=', 'p.sub_category_id')
            ->leftJoin('brands as b', 'b.id', '=', 'p.brand_id')
            ->get();
        // dd($products);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $cats = CategoryModel::all();
        $subcats = SubCatModel::all();
        $brands = BrandModel::all();
        return view('admin.products.create', compact('cats', 'subcats', 'brands'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'title' => 'required',
            'small_description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'is_active' => 'required',
            'weight' => 'required',
            'images' => 'required',
        ]);
        $images = array();


        $record = DB::table('products')->select('id', 'product_code')->latest('id')->first();
        if ($record) {
            $expNum = $record->id;
            $expNum = explode('-', $record->product_code);
            $nextProID = 'PD-' . date('y') . '-' . sprintf("%06d", $expNum[2] + 1);
        } else {
            $expNum  = 1;
            $nextProID = 'PD-' . date('y') . '-' . sprintf("%06d", 1);
        }

        try {
            if ($request->file('images')) {
                foreach ($request->file('images') as $img) {
                    // dd($img);
                    $ext = pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
                    if ($ext == null || $ext == '') {
                        $ext = 'jpeg';
                    }
                    $image_name = time() . rand() . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->title)) . '.' . $ext;
                    // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_name, 'public');
                    $file_path = $img->move(public_path('uploads/products'), $image_name);
                    array_push($images, env('APP_URL') . "/uploads/products/" . $image_name);
                }
            }

            $res = ProductModel::create([
                "product_code" => $nextProID,
                "category_id" => $request->category_id,
                "sub_category_id" => $request->sub_category_id,
                "brand_id" => $request->brand_id,
                "title" => $request->title,
                "small_description" => $request->small_description,
                "description" => $request->description,
                "price" => $request->price,
                "discount_price" => $request->discount_price,
                "discount_pre" => $request->discount_pre,
                "stock" => $request->stock,
                "max_order_qty" => $request->max_order_qty,
                "weight" => $request->weight,
                "image1_path" => $images[0],
                "image2_path" => isset($images[1]) ? $images[1] : null,
                "image3_path" => isset($images[2]) ? $images[2] : null,
                "image4_path" => isset($images[3]) ? $images[3] : null,
                "variations" => $request->variations,
                "is_available" => $request->is_available ? $request->is_available : 1,
                "is_featured" => $request->is_featured,
                "is_new" => $request->is_new,
                "is_hot_sell" => $request->is_hot_sell,
                "is_active" => $request->status ? $request->status : 0,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->title)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),

            ]);

            if ($res) {
                return redirect()->route('product.index')->with('success', 'Product created successfully.');
            } else {
                return redirect()->route('product.index')->with('error', 'Product creating failed.');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function edit($id)
    {
        $cats = CategoryModel::all();
        $subcats = SubCatModel::all();
        $brands = BrandModel::all();
        $product = ProductModel::where('id', $id)->first();
        return view('admin.products.edit', compact('cats', 'subcats', 'brands', 'product'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->variations);
        // print_r(json_encode($request->all()));
        // exit();

        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'title' => 'required',
            'small_description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
        ]);
        $images = array();
        $product = ProductModel::select('image1_path', 'image2_path', 'image3_path', 'image4_path', 'is_available')->where('id', $id)->first();
        // dd(basename($product->image1_path));
        // if ($product->image1_path) Storage::disk('public/uploads/products')->delete(basename($product->image1_path));
        // if ($product->image2_path) Storage::disk('public/uploads/products')->delete(basename($product->image2_path));
        // if ($product->image3_path) Storage::disk('public/uploads/products')->delete(basename($product->image3_path));
        // if ($product->image4_path) Storage::disk('public/uploads/products')->delete(basename($product->image4_path));
        // Storage::delete('uploads/products/' . basename($product->image1_path));
        // Storage::delete('uploads/products/' . basename($product->image2_path));
        // Storage::delete('uploads/products/' . basename($product->image3_path));
        // Storage::delete('uploads/products/' . basename($product->image4_path));
        try {
            
            $updateValues = [
                "category_id" => $request->category_id,
                "sub_category_id" => $request->sub_category_id,
                "brand_id" => $request->brand_id,
                "title" => $request->title,
                "small_description" => $request->small_description,
                "description" => $request->description,
                "price" => $request->price,
                "discount_price" => $request->discount_price,
                "discount_pre" => $request->discount_pre,
                "stock" => $request->stock,
                "max_order_qty" => $request->max_order_qty,
                "weight" => $request->weight,
                "variations" => $request->variations,
                "is_available" => isset($request->is_available) ? $request->is_available : 1,
                "is_featured" => isset($request->is_featured) && $request->is_featured == "1" ? 1 : 0,
                "is_new" => isset($request->is_new) && $request->is_new == "1" ? 1 : 0,
                "is_hot_sell" => isset($request->is_hot_sell) && $request->is_hot_sell == "1" ? 1 : 0,
                "is_active" => isset($request->is_active) && $request->is_active == "on" ? 1 : 0,
                "metaname" => preg_replace("/[^\w]+/", "-", strtolower($request->title)),
                "created_at" => Carbon::now()->timezone('Asia/Colombo'),
                "updated_at" => Carbon::now()->timezone('Asia/Colombo'),
            ];
            // dd($request->images);
            if ($request->file('images')) {
                // $has_image = false;
                foreach ($request->file('images') as $img) {
                    // if($img->getClientOriginalName() == $product->image1_path)
                    $ext = pathinfo($img->getClientOriginalName(), PATHINFO_EXTENSION);
                    if ($ext == null || $ext == '') {
                        $ext = 'jpeg';
                    }
                    $image_name = time() . rand(10, 1000) . '-' . preg_replace("/[^\w]+/", "-", strtolower($request->title)) . '.' . $ext;
                    // $file_path = $request->file('image_1')->storeAs('uploads/categories', $image_name, 'public');
                    $file_path = $img->move(public_path('uploads/products'), $image_name);
                    array_push($images, env('APP_URL') . "/uploads/products/" . $image_name);
                }
            }

            isset($images[0]) ? $updateValues['image1_path'] = $images[0] : $updateValues['image1_path'] = null;
            isset($images[1]) ? $updateValues['image2_path'] = $images[1] : $updateValues['image2_path'] = null;
            isset($images[2]) ? $updateValues['image3_path'] = $images[2] : $updateValues['image3_path'] = null;
            isset($images[3]) ? $updateValues['image4_path'] = $images[3] : $updateValues['image4_path'] = null;

            $res = ProductModel::where('id', $id)
                ->update($updateValues);

            if ($res) {
                return redirect()->route('product.index')->with('success', 'Product Update successfully.');
            } else {
                return redirect()->route('product.index')->with('error', 'Product Updating failed.');
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
            $result = ProductModel::where('id', $id)->delete();
            if ($result) {
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Product Deleted',
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Product Delete Failed',
                    ],
                    200
                );
            }
        } catch (\Illuminate\Database\QueryException $e) {

            if ($e->getCode() === '23000') {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'This product is already in use. Cannot Delete',
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
