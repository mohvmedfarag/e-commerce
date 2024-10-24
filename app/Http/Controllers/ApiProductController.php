<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
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
                "msg" => "Product not found",
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "desc" => "required|string",
            "price" => "required|numeric",
            "image" => "required|image",
            "quantity" => "required|numeric",
            "category_id" => "required|exists:categories,id",
        ]);
        // check errors
        if($validator->fails()){
            return response()->json([
                "error" => $validator->errors(),
            ], 301);
        }
        // image
        $image = Storage::putFile("products", $request->image);

        // create
        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "image" => $image,
            "quantity" => $request->quantity,
            "category_id" => $request->category_id,
        ]);
        
        //msg
        return response()->json([
            "msg" => "product created successfully",
        ], 201);

    }
    public function update($id, Request $request){
        // select one
        $product = Product::find($id);
        if ($product == null) {
            return response()->json([
                "error" => "Product not found",
            ],404);
        }

        // validation
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "desc" => "required|string",
            "price" => "required|numeric",
            "image" => "image",
            "quantity" => "required|numeric",
            "category_id" => "required|exists:categories,id",
        ]);
        // check errors
        if($validator->fails()){
            return response()->json([
                "error" => $validator->errors(),
            ], 301);
        }
        // image
        $image = $product->image; // old image
        if ($request->hasFile("image")) {
            Storage::delete($product->image);
            $image = Storage::putFile("products", $request->image); // new image
        }
        // update
        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "image" => $image,
            "quantity" => $request->quantity,
            "category_id" => $request->category_id,
        ]);
        // msg
        return response()->json([
            "msg" => "product updated successfully",
            "product" => new ProductResource($product),
        ], 201);
        
    }
    public function delete($id){
        // select one
        $product = Product::find($id);
        if ($product == null) {
            return response()->json([
                "error" => "Product not found",
            ],404);
        }
        // image
        if($product->image !== null){
            Storage::delete($product->image);
        }
        // delete
        $product->delete();
        // msg
        return response()->json([
            "msg" => "product deleted successfully",
        ], 201);
    }
}
