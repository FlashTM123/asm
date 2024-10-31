<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class CategoryControllers extends Controller
{
 public function getAll() {
        $category = DB::table('category')->get();

        return view("Category.Categorylist", ["listcategory" => $category]);
 }
    public function add(){
        return view('Category.Categoryadd');
    }
    public function save(\Illuminate\Http\Request $request) {
        // Lấy giá trị từ form
        $CategoryName = $request->input('category_name');
        $description = $request->input('category_desc');


        if (empty($CategoryName)) {
            return redirect()->back()->with('error', 'Category name cannot be null.');
        }


        DB::table("category")->insert([
            "category_name" => $CategoryName,
            "category_desc" => $description,
        ]);

        return redirect()->route('category.list')->with('success', 'Category added successfully!');
    }

    public function edit($id) {
        $category = DB::table('category')->where('id', $id)->first();
        return view('Category.Categoryedit', ['category' => $category]);
    }
    public function update(\Illuminate\Http\Request $request) {
        $id = $request->id;
        $CategoryName = $request->input('category_name');
        $description = $request->input('category_desc');

        // Kiểm tra xem CategoryName có null hay không
        if (is_null($CategoryName)) {
            return redirect()->back()->with('error', 'Category name cannot be null.');
        }

        DB::table('category')
            ->where('id', $id)
            ->update([
                "category_name" => $CategoryName,
                "category_desc" => $description,
            ]);

        return redirect()->route('category.list')->with('success', 'Category updated successfully!');
    }
    public function delete($id){
        DB::table('category')->where('id', $id)->delete();
        return redirect()->route('category.list')->with('success', 'Category deleted successfully!');
    }
}
