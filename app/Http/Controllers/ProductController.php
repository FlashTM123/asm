<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getAll2() {
        $listProduct = DB::table('product')->get();
//        dd($listProduct);  // Kiểm tra dữ liệu
        return view('Productlist2', ['listProduct' => $listProduct]);
    }


    public function delete($id){
        DB::table('product')->where('id', $id)->delete();
        return redirect('/product-list2');
    }
    public function add(){
        return view('ProductAdd');
    }
    public function save(\Illuminate\Http\Request $request) {
        $productName = $request->productName;
        $price = $request->price;
        $description = $request->description;
        $importedDate = $request->importedDate;
        $image = $request -> image;

        DB::table("product")->insert([
            "product_name" => $productName,
            "price" => $price,
            "description" => $description,
            "imported_date" => $importedDate,
            "image" => $image
        ]);

        return redirect("/product-list2");
    }
    public function edit($id) {
        $product = DB::table('product')->where('id', $id)->first();
        return view('ProductEdit', ['product' => $product]);
    }

    public function update(\Illuminate\Http\Request $request) {
        $id = $request->id;
        $productName = $request->productName;
        $price = $request->price;
        $description = $request->description;
        $importedDate = $request->imported_date;
        $image = $request -> image;

        DB::table('product')
            ->where('id', $id)
            ->update([
                'product_name' => $productName,
                'price' => $price,
                'description' => $description,
                'imported_date' => $importedDate,
                "image" => $image
            ]);

        return redirect('/product-list2');
    }



};

