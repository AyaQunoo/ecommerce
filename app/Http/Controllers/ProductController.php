<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    //
    public function all()
    {
        $products = Product::paginate(5);
        return view('admin.home', ["products" => $products]);
    }
    public function create()
    {

        return view('admin.create');
    }
    public function store(Request $request)
    {


        $data =  $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "image" => "image|mimes:png,jpeg,jpg"
        ]);

        $data["image"] = Storage::putfile("products", $request->image);

        Product::create($data);
        return view("admin.create")->with("success", "added successfully");
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect(url("products"));
    }
    public function edit(Request $request)
    {

        $product =  Product::findOrFail($request->id);

        return view("admin.edit", ["product" => $product]);
    }
    public function update(Request $request)
    {

        $product =  Product::findOrFail($request->id);
        $data =   $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "image" => "image|mimes:png,jpeg,jpg"
        ]);
        if ($request->has("image")) {
            Storage::delete($product->image);

            $data["image"] = Storage::putFile("products", $request->image);
        } else {
            $data["image"] = $product->image;
        }
        $product->update($data);
        session()->flash("success", "product has been updated succesfully");
        return  redirect(url("/products"));
    }
}
