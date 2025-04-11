<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all() {
        $products = Product::paginate(5);
        return view('user.home', ["products" => $products]);
    }
   
}
