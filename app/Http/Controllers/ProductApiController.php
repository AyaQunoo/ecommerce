<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductApiController extends Controller
{
    public function all()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }
    public function show($id)
    {
        $product = Product::find($id);
        if ($product !== null) {
            return new ProductResource($product);
        } else {
            return response()->json([
                "message" => "not found"
            ], 404);
        }
    }
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "image" => "required|image|mimes:png,jpeg,jpg"
        ]);
        if ($validate->fails()) {
            return response()->json([
                "message" => $validate->errors()
            ], 400);
        }

        $image =  Storage::putFile("products", $request->image);
        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image
        ]);
        return response()->json([
            "message" => "product created sucsessfully !"
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response()->json([
                "message" => "not found",
            ], 404);
        }
        $validate = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "image" => "required|image|mimes:png,jpeg,jpg"
        ]);
        if ($validate->fails()) {
            return response()->json([
                "errors" => $validate->errors(),
            ], 400);
        }

        $image = $product->image;
        if ($request->has("image")) {
            Storage::delete($product->image);
            $image = Storage::putFile("products", $request->image);
        }
        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image
        ]);
        return response()->json([
            "mesaage" => "product has been updated  successfully",
            "data" => new ProductResource($product),
        ], 200);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response()->json([
                "message" => "not found",
            ], 404);
        }
        if ($product->image !== null) {
            Storage::delete($product->image);
        }
        $product->delete();
        return response()->json([
            "message" => "product deleted successfully !!",
        ], 200);
    }
}
