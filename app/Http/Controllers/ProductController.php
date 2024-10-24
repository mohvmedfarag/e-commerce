<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all(){
        $products = Product::get();
        return view('admin.home', ['products' => $products]);
    }
    public function show($id){
        $product = Product::findOrFail($id);
        return view('admin.show')->with("product", $product);

    }
    public function create(){
        $categories = Category::all();
        return view('admin.create', ['categories' => $categories]);
    }
    public function store(Request $request){
        $data = $request->validate([
            "name" => "required|string",
            "desc" => "required|string",
            "price" => "required|numeric",
            "image" => "required|image",
            "quantity" => "required|numeric",
            "category_id" => "required|exists:categories,id",
        ]);
        
        $data['image'] = Storage::putFile("products",$request->image);
        Product::create($data);
        session()->flash('success', 'Product inserted successfully');
        
        $products = Product::get();
        return view('admin.home', ['products' => $products]);
        
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update($id, Request $request){
        $data = $request->validate([
            "name" => "required|string",
            "desc" => "required|string",
            "price" => "required|numeric",
            "image" => "image|mimes:png,jpg,jpeg",
            "quantity" => "required|numeric",
            "category_id" => "required|exists:categories,id",
        ]);
        $product = Product::findOrFail($id);

        $oldImage = $product->image;

        if ($request->has('image')) {
            Storage::delete($oldImage);
            $data['image'] = Storage::putFile("products",$request->image);
        } else {
            $data['image'] = $oldImage;
        }
        
        $product->update($data);
        session()->flash('success', 'product updated successfully');

        return redirect(url("products/show/$id"));
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect('products');
    }
}
