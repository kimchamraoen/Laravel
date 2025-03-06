<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * GET /api/products
     */
    public function getProducts()
    {
        $products=Product::with('category')->get(); // Fetch products with their categories
        return response()->json($products);
    }

    /**
     * POST /api/products
     */
    public function createProduct(Request $request)
    {
        $imagePaths = [];
        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $imagePaths[] = $image->store('images', 'public');
                $path = $image->store('images', 'public');
            }
        }
        $product= Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'pricing' => $request->pricing,
            'description' => $request->description,
            'images' => $imagePaths
        ]);
        if(!$product) {
            return response()->json(["message" => "Product not created"], 400);
        }
        return response()->json([
            "message" => "Product created successfully",
            "product" => $product
        ], 201);
    }

    /**
     * GET /api/products/{productId}
     */
    public function getProduct($categoryId)
    {
        $product = Product::with('category')->find($categoryId); // Fetch product with its category
        return response()->json($product);
    }

    /**
     * PATCH /api/products/{productId}
     */
    public function updateProduct(Request $request,$categoryId)
    {
        $product = Product::find($categoryId);
        $product ->update($request->all());
        return response()->json([
            "message" => "Product updated successfully",
            "product" => $product->fresh()
        ]);
    }

    /**
     * DELETE /api/products/{productId}
     */
    public function deleteProduct($categoryId) // Corrected method name
    {
        $product = Product::find($categoryId);
        if($product->images){
            foreach($product->images as $image){
                Storage::disk('public')->delete($image);
            }
        }
        $product->delete();
        return response()->json(["message" => "Product deleted successfully"]);
    }

    /**
     * Get /api/categories/{categoryId}/products
     */
    public function getProducstId($categoryId) // Corrected method name
    {
        return ["message" => "Deleting 1 category based on given categoryId"]; // Corrected spelling and wording
    }
}
