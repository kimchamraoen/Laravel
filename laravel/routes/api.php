<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // Removed unnecessary backslash
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->prefix('categories')->group(function() {
    Route::get('/', 'getCategories');
    Route::post('/', 'createCategory'); // Removed space before method name
    Route::get('/{categoryId}', 'getCategory');
    Route::patch('/{categoryId}', 'updateCategory');
    Route::delete('/{categoryId}', 'deleteCategory');
});

Route::controller(ProductController::class)->prefix('products')->group(function() {
    Route::get('/', 'getProducts');
    Route::post('/', 'createProduct'); // Removed space before method name
    Route::get('/{productId}', 'getProduct');
    Route::patch('/{productId}', 'updateProduct');
    Route::delete('/productId}', 'deleteProduct');
    // Route::get('/categoryId','getproducts');
});