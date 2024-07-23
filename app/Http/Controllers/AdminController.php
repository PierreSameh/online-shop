<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function categoryIndex(){
        return view('admin/category');
    }

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
}
