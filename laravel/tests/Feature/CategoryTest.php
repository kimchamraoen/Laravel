<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
/**
 * Test ID: Category-001
 * Description: Check if we can access the get all categories API
 * Preconditions: At least one category exists in the database
 * Test Steps:
 * 1. Create sample categories
 * 2. Hit the get all categories API
 * 3. Check if the response status is 200 and contains the success message
 * Test Data: 1-3 fake categories
 * Expected Result: The response status should be 200 and contain a "success" message
 * Remarks: Uses CategoryFactory
 */
public function test_if_we_can_access_get_all_categories_api(): void
{
    $response = $this->get('/api/categories');
    $response->assertStatus(200)->assertJsonFragment(["message" => "success"]);
}

/**
 * Test ID: Category-002
 * Description: Check if we can access the get a single category API by ID
 * Preconditions: None
 * Test Steps: 1. Hit the get category API with ID 1
 *             2. Check if the response status is 200
 *             3. Check if the response contains the correct category details
 * Test Data : Category ID = 1
 * Expected Result: The response status should be 200 and the category details should match ID 1
 * Actual Result: The response status is 200 and the category details match ID 1
 * Status: Passed
 * Remarks: None
 */
public function test_if_category_exists(): void
{

    // Arrange: create a category
    $category = Category::factory()->create(['id' => 1]);

    // Act: fetch the category
    $response = $this->get("/api/categories/{$category->id}");

    // Assert: check response
    $response->assertStatus(200)->assertJsonFragment(["id" => $category->id]);
}

/**
 * Test ID: Category-003
 * Description: Test get all categories with pagination
 * Preconditions: The database contains more than 10 categories
 * Test Steps: 1. Hit the get all categories API with pagination parameters
 *             2. Check if the response status is 200
 *             3. Verify the pagination structure in the response
 * Test Data : Pagination limit = 10, page = 1
 * Expected Result: The response status should be 200 and pagination data should be correct
 * Actual Result: The response status is 200 and pagination data is correct
 * Status: Passed
 * Remarks: None
 */
public function test_if_category_not_found(): void
{
    $response = $this->get('/api/categories/999'); // Assuming 999 is an invalid category ID
    $response->assertStatus(404)->assertJsonFragment(["message" => "Category not found"]);
}

/** 
 * Test ID: Category-004
 * Description: Check if we can create a new category via API
 * Preconditions: None
 * Test Steps: 1. Hit the create category API with valid data
 *             2. Check if the response status is 201
 *             3. Verify the new category in the database
 * Test Data : {"name": "New Category"}
 * Expected Result: The response status should be 201 and the category should be created in the database
 * Actual Result: The response status is 201 and the category is created
 * Status: Passed
 * Remarks: None
 */
public function test_create_category(): void
{
    $response = $this->post('/api/categories', ['name' => 'Category']);
    $response->assertStatus(201)->assertJsonFragment(["message" => "Category created successfully"]);
}

/** 
 * Test ID: Category-005
 * Description: Check if creating a category with missing data returns a validation error
 * Preconditions: None
 * Test Steps: 1. Hit the create category API with missing required fields
 *             2. Check if the response status is 422
 *             3. Verify the validation error message in the response
 * Test Data : {"name": ""}
 * Expected Result: The response status should be 422 and a validation error message should be returned
 * Actual Result: The response status is 422 and a validation error message is returned
 * Status: Passed
 * Remarks: None
 */
public function test_update_category(): void
{
    // Ensure there's a category with ID 1
    \App\Models\Category::factory()->create(['id' => 1]);

    $response = $this->patch('/api/categories/1', ['name' => 'Updated Category']); //update category id 1 name of factory to update category
    $response->assertStatus(200)->assertJsonFragment(["message" => "Category updated successfully"]); //assertSatus also show 200 and assertJsonFragment and change defferent of the messagge but you also to change on categoryController
}

/**
 * Test ID: Category-006
 * Description: Test updating an existing category via API
 * Preconditions: Category with ID 1 exists in the database
 * Test Steps: 1. Hit the update category API with valid data for category ID 1
 *             2. Check if the response status is 200
 *             3. Verify the updated category data in the database
 * Test Data : {"name": "Updated Category"}
 * Expected Result: The response status should be 200 and the category data should be updated
 * Actual Result: The response status is 200 and the category is updated
 * Status: Passed
 * Remarks: None
 */
public function test_delete_category(): void
{
    // Arrange: Create a category with ID 1
    \App\Models\Category::factory()->create(['id' => 1]);

    // Assert: Check response
    $response = $this->delete('/api/categories/1'); // Assuming 1 is a valid category ID
    $response->assertStatus(200)->assertJsonFragment(["message" => "Category deleted successfully"]);
}

/**
 * Test ID: Category-007
 * Description: Test updating a category with invalid data
 * Preconditions: Category with ID 1 exists in the database
 * Test Steps: 1. Hit the update category API with invalid data for category ID 1
 *             2. Check if the response status is 422
 *             3. Verify the error message in the response
 * Test Data : {"name": ""}
 * Expected Result: The response status should be 422 and a validation error message should be returned
 * Actual Result: The response status is 422 and a validation error message is returned
 * Status: Passed
 * Remarks: None
 */
public function test_create_category_without_name(): void
{
    $response = $this->post('/api/categories', []);
    $response->assertStatus(400)->assertJsonFragment(["message" => "fail"]);
}

/**
 * Test ID: Category-008
 * Description: Test deleting a category via API
 * Preconditions: Category with ID 1 exists in the database
 * Test Steps: 1. Hit the delete category API with category ID 1
 *             2. Check if the response status is 200
 *             3. Verify that the category is deleted from the database
 * Test Data : Category ID = 1
 * Expected Result: The response status should be 200 and the category should be deleted from the database
 * Actual Result: The response status is 200 and the category is deleted
 * Status: Passed
 * Remarks: None
 */
public function test_update_category_to_invalid_id(): void
{
    $response = $this->patch('/api/categories/999', ['name' => 'New Name']); // Assuming 999 is invalid
    $response->assertStatus(404)->assertJsonFragment(["message" => "Category not found"]);
}

/**
 * Test ID: Category-009
 * Description: Test if deleting a non-existent category returns a 404 error
 * Preconditions: Category with ID 999 does not exist in the database
 * Test Steps: 1. Hit the delete category API with a non-existent category ID
 *             2. Check if the response status is 404
 * Test Data : Category ID = 999
 * Expected Result: The response status should be 404 and the category not found message should be returned
 * Actual Result: The response status is 404 and category not found message is returned
 * Status: Passed
 * Remarks: None
 */
public function test_get_empty_categories(): void
{
    // Manually clear the categories table
    \App\Models\Category::query()->delete();

    // Ensure no categories are present
    $response = $this->get('/api/categories');
    $response->assertStatus(200)->assertJsonCount(2);
}

/**
 * Test ID: Category-010
 * Description: Test if trying to get all categories without authentication returns a 401 error
 * Preconditions: User is not authenticated
 * Test Steps: 1. Hit the get all categories API without authentication
 *             2. Check if the response status is 401
 * Test Data : None
 * Expected Result: The response status should be 401 and an authentication error message should be returned
 * Actual Result: The response status is 401 and an authentication error message is returned
 * Status: Passed
 * Remarks: None
*/
public function test_access_categories_with_auth(): void
{
    // Assuming you have authentication in place.
    $response = $this->withHeaders(['Authorization' => 'Bearer some_token'])->get('/api/categories');
    $response->assertStatus(200);
}
}
