<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

    public function save(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'required|string|max:255|unique:category',
                'category_desc' => 'nullable|string|max:255',
            ]);

            DB::table('category')->insert([
                'category_name' => $validatedData['category_name'],
                'category_desc' => $validatedData['category_desc'],
                'created_at' => now(),
            ]);

            return redirect()->route('category.list')->with('success', 'Category added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Failed to add category: ' . $e->getMessage()]);
        }
    }

    public function edit($id) {
        $category = DB::table('category')->where('id', $id)->first();
        return view('Category.Categoryedit', ['category' => $category]);
    }

    public function update(Request $request) {
        $id = $request->id;
        $CategoryName = $request->input('category_name');
        $description = $request->input('category_desc');

        if (is_null($CategoryName)) {
            return redirect()->back()->with('error', 'Category name cannot be null.');
        }

        $existingCategory = DB::table('category')
            ->where('category_name', $CategoryName)
            ->where('id', '!=', $id)
            ->first();
        if ($existingCategory) {
            return redirect()->back()->with('error', 'Category name already exists.');
        }

        DB::table('category')
            ->where('id', $id)
            ->update([
                "category_name" => $CategoryName,
                "category_desc" => $description,
                "updated_at" => now(),
            ]);

        return redirect()->route('category.list')->with('success', 'Category updated successfully!');
    }

    public function delete($id){
        DB::transaction(function () use ($id) {
            // Delete orders associated with products in the category
            $products = DB::table('product')->where('category_id', $id)->pluck('id');
            DB::table('orders')->whereIn('product_id', $products)->delete();

            // Delete products in the category
            DB::table('product')->where('category_id', $id)->delete();

            // Delete the category
            DB::table('category')->where('id', $id)->delete();
        });

        return redirect()->route('category.list')->with('success', 'Category, associated products, and orders deleted successfully!');
    }
}
