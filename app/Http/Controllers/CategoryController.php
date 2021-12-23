<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function getAllCategory()
    {

        // To get all the category from the database
        $allCategory = Category::all();

        // Putting all of the categories from into an array
        $data = [
            'categories' => $allCategory
        ];

        return $data;
    }


    public function getCategory($id)
    {

        // Get specific category
        $category = Category::where('id', $id)->first();

        return $category;
    }

    // Getting add category view
    public function showAddCategoryView()
    {

        return view('addCategory');
    }

    // Getting category view
    public function showCategoryView()
    {

        return view("viewCategory", $this->getAllCategory());
    }



    public function addCategory(Request $request)
    {

        // Category information validation
        $request->validate([
            'categoryName' => 'required|min:2|unique:categories',
        ]);

        // Creating a new category (Inserting it into database)
        Category::create($request->all());

        return redirect('category');
    }



    public function deleteCategory(Request $request)
    {

        // Get the category id that want to be deleted
        $id = $request->id;

        // Select the category
        $selectedCategory = Category::where('id', $id)->first();

        // Delete category from database
        $selectedCategory->delete();

        return redirect('category');
    }

    public function editCategoryView(Request $request)
    {

        // Get the category id that want to be deleted
        $id = $request->id;

        // Select the category
        $selectedCategory = Category::where('id', $id)->first();

         // Put the category information to an array
        $data = [
            'selectedCategory' => $selectedCategory
        ];

        return view('editCategory', $data);
    }

    public function updateCategory(Request $request)
    {
         // Get the category id that want to be deleted
        $id = $request->id;

        $updateCategoryName = $request->updateCategoryName;

        
        // Category information validation
        $request->validate([
            'updateCategoryName' => 'required|min:2|unique:categories,categoryName,' . $id
        ]);

         // Updating the category in database
        Category::where('id', $id)->first()->update([
            'categoryName' => $updateCategoryName
        ]);

        return redirect('category');
    }
}
