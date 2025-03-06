<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * GET /api/categories
     */
    public function getCategories()
    {
        return ["message" => "Getting 1 new category"];
        // return Category::all();
    }

    /**
     * POST /api/categories
     */
    public function createCategory()
    {
        return ["message" => "Creating 1 new category"]; // Corrected spelling
    }

    /**
     * GET /api/categories/{categoryId}
     */
    public function getCategory($categoryId)
    {
        return ["message" => "Getting 1 category based on given categoryId"]; // Improved wording
        // return $category=Category::where('active',1)->first();
    }

    /**
     * PATCH /api/categories/{categoryId}
     */
    public function updateCategory($categoryId)
    {
        return ["message" => "Updating 1 category based on given categoryId"]; // Improved wording
    }

    /**
     * DELETE /api/categories/{categoryId}
     */
    public function deleteCategory($categoryId) // Corrected method name
    {
        return ["message" => "Deleting 1 category based on given categoryId"]; // Corrected spelling and wording
    }
}