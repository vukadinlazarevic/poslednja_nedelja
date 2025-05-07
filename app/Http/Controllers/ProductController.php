<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list() {
        return view("product-list", [
            "products" => Product::all(),
            "trenutni_korisnik" => Auth::user()
        ]);
    }

    public function add() {
        return view('product-create', [
            "categories" => Category::all()
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:256',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();

        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->category_id = $request->input("category_id");
        $product->user_id = Auth::user()->id;
        $product->price = $request->input("price");

        if ($request->hasFile("image")) {
            $imageFile = $request->file("image");
            // 12345 . jpg
            $imageName = time() . "." . $imageFile->getClientOriginalExtension();
            // 123456 . png
            $imagePath = $imageFile->storeAs("product_images", $imageName, 'public');
            $product->image = $imagePath;
        }

        $product->save();
        return redirect()->route('product-list')->with("success", "Proizvod je uspesno sacuvan");
    }
}
