<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function redirect()
    {
        if (Auth::user()->role === "user") {
            $products = Product::paginate(3);
            return view("user.home", ["products" => $products]);
        } else {
            $products = Product::paginate(7);
            return view('admin.home', ["products" => $products]);
        }
    }
}
