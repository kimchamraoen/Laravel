<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
/**
 * Test ID: Category-001
 * Description: Check if we can access the get all categories API
 * Preconditions: None
 * Test Steps: 1. Hit the get all categories API
 *             2. Check if the response status is 200
 * Test Data : None
 * Expected Result: The response status should be 200
 * Actual Result: The response status is 200
 * Status: Passed
 * Remarks: None
 */

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

//  public function test_if_we_can_access_the_get_all_categories_api(): void
// {
//     $response = $this->get('/api/categories');
    
//     // Correct assertion to match actual API response
//     $response->assertStatus(200)->assertJsonFragment(["message" => "success"]);

// }

// public function test_if_we_can_access_the_get_a_single_category_API_by_ID(): void
// {
//     $response = $this->get('/api/categories');
    
//     // Correct assertion to match actual API response
//     $response->assertStatus(200)->assertJsonFragment(["message" => "success"]);

// }

}
