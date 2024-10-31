<?php

namespace App\Http\Controllers;

// Sử dụng dòng import này
use Illuminate\Http\Request;

// Không sử dụng dòng import này
// use Illuminate\Http\Client\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{




    public function getAll2(Request $request)
    {
        // Lấy tất cả danh mục
        $categories = DB::table('category')->get();

        // Lấy sản phẩm theo danh mục nếu có
        $query = DB::table('product')->join('category', 'product.category_id', '=', 'category.id');

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('product.category_id', $request->category_id);
        }

        $listProduct = $query->select('product.*', 'category.category_name')->get();

        return view('productlist.Productlist2', compact('listProduct', 'categories'));
    }








    public function delete($id){
        DB::table('product')->where('id', $id)->delete();
        return redirect('/product-list2');
    }
    public function add(){
        return view('productlist.ProductAdd');
    }
    public function save(Request $request)
    {

        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|url',
            'height' => 'required|numeric',
            'watering_time_per_day' => 'required|integer',
            'category_id' => 'required|exists:category,id',
        ]);


        DB::table('product')->insert([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image,
            'height' => $request->height,
            'watering_time_per_day' => $request->watering_time_per_day,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.list')->with('success', 'Product added successfully!');
    }



    public function edit($id) {
        $product = DB::table('product')->where('id', $id)->first();
        $categories = DB::table('category')->get();
        return view('productlist.ProductEdit', compact('product', 'categories'));
    }

    public function update(\Illuminate\Http\Request $request) {
        $id = $request->id;
        $productName = $request->productName;
        $price = $request->price;
        $description = $request->description;
        $image = $request -> image;
        $height = $request -> height;
        $watering_time_per_day = $request-> watering_time_per_day;
        $category_id = $request-> category_id;
        DB::table('product')
            ->where('id', $id)
            ->update([
                'product_name' => $productName,
                'price' => $price,
                'description' => $description,
                "image" => $image,
                'height' => $height,
                'watering_time_per_day' => $watering_time_per_day,
                'category_id' => $category_id,
            ]);

        return redirect()->route('product.list');
    }



    public function create()
    {
        $categories = DB::table('category')->get(); // Lấy danh sách danh mục từ bảng category
        return view('productlist.ProductAdd', ['categories' => $categories]);
    }

    public function showAddProductForm()
    {
        // Lấy danh sách danh mục từ bảng category
        $categories = DB::table('category')->get();

        // Truyền danh sách danh mục vào view
        return view('productlist.ProductAdd', ['categories' => $categories]);
    }




};

