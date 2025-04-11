<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Order;
use App\Models\orderDetails;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.product.show', ["product" => $product]);
    }
    public function all()
    {
        $products = Product::paginate(5);
        return view('user.home', ["products" => $products]);
    }
    public function addToCart(Request $request, $id)
    {
        $quantity = $request->quantity;
        $product = Product::findOrFail($id);
        $cart = session()->get("cart");
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "price" => $product->price,
                    "image" => $product->image,
                    "quantity" => $quantity
                ]
            ];
            session()->put("cart", $cart);
            return redirect()->back();
        } else {
            if (isset($cart[$id])) {
                $cart[$id]["quantity"] += $quantity;
                session()->put("cart", $cart);
                return redirect()->back();
            }
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => $quantity

            ];
            session()->put("cart", $cart);
            return redirect()->back();
        }
    }
    public function myCart()
    {
        $cart = session()->get('cart') ?? [];

        return view('user.product.cart', ["cart" => $cart]);
    }
    public function makeOrder(Request $request)
    {
        $cart = session()->get("cart");
        $user = Auth::user();
        $order = Order::create([
            "user_id" => $user->id
        ]);
        foreach ($cart as $id => $product) {
            orderDetails::create([
                "order_id" => $order->id,
                "product_id" => $id,
                "price" => $product["price"],
                "quantity" => $product["quantity"],

            ]);
            return redirect()->back();
        }
    }
    public function addToFav($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();
        $isFav = Favorite::where("user_id", $user->id)->where("product_id", $id)->first();
        if ($isFav !== null) {
            $isFav->delete();
            return redirect()->back();
        } else {
            Favorite::create([
                "user_id" => $user->id,
                "product_id" => $id
            ]);
            return redirect()->back();
        }
    }
}
