<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * GET /api/products
     */
    public function getProducts()
    {
        try {
            $products = Product::all();
            return response()->json(["success" => true, "data" => $products], 200);
        } catch (\Exception $e) {
            return response()->json(["success" => false, "message" => "Failed to retrieve products", "error" => $e->getMessage()], 500);
        }
    }

    /**
     * POST /api/products
     */
    public function createProduct(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'nullable|exists:categories,id',  // This is fine
                'pricing' => 'required|numeric|min:0',
                'description' => 'nullable|string',
                'images' => 'required|array',  // Change to accept an array
                // 'images.*' => 'url'  // Each image must be a valid URL
            ]);

            $product = Product::create($validatedData);

            return response()->json(["success" => true, "data" => $product], 201);
        } catch (\Exception $e) {
            return response()->json(["success" => false, "message" => "Failed to create product", "error" => $e->getMessage()], 500);
        }
    }

    /**
     * GET /api/products/{productId}
     */
    public function getProduct($categoryId)
    {
        return ["message" => "Getting 1 category based on given categoryId"]; // Improved wording
        // return $category=Category::where('active',1)->first();
    }

    /**
     * PATCH /api/products/{productId}
     */
    public function updateProduct($categoryId)
    {
        return ["message" => "Updating 1 category based on given categoryId"]; // Improved wording
    }

    /**
     * DELETE /api/products/{productId}
     */
    public function deleteProduct($categoryId) // Corrected method name
    {
        return ["message" => "Deleting 1 category based on given categoryId"]; // Corrected spelling and wording
    }

    /**
     * Get /api/categories/{categoryId}/products
     */
    public function getProducstId($categoryId) // Corrected method name
    {
        return ["message" => "Deleting 1 category based on given categoryId"]; // Corrected spelling and wording
    }
}
