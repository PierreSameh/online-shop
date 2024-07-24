<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    // Show Category Page on Admin Dashboard
    public function categoryIndex(){
        $categories = Category::all();

        return view('admin/category', compact('categories'));
    }
    // Show * Categories from DB
    public function categoryStore(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:100'
            ]);
        $category = Category::create([
            'category_name'=> $request->input('category_name')
        ]);
        $category->save();
        return redirect()->back()->with('success','Category Added Successfully');
    }
    // Delete a Category From DB
    public function categoryDelete(Category $category){
        $category->delete();

        return redirect()->back()->with('delete', $category->category_name . ' Category Deleted');
    }
}
