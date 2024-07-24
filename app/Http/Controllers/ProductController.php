<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show products from DB inside admin Dashboard
    public function productIndex() {
        $products = Product::all();

        return view("admin/product", compact("products"));
    }
    // ADD Product View
    public function productCreate() {
        
        return view("admin/create-product");
    }
}
