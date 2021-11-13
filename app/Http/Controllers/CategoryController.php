<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function getAllCategory(){

        $allCategory = Category::all();

        $data = [
            'categories' => $allCategory
        ];

        return $data;
    }

   
    public function getCategory($id){
        $category = Category::where('id', $id)->first();

        return $category;
    }

    public function showAddCategoryView(){

        return view('addCategory');
    }

    public function showCategoryView(){


        return view("categoryView", $this->getAllCategory());
    }

    public function addCategory(Request $request){
        
        $request->validate([
            'categoryName' => 'required',
        ]);

    
        Category::create($request->all());

        return redirect('/category');
    }



    public function deleteCategory(Request $request){
        $id = $request->id;

        $selectedCategory = Category::where('id', $id)->first();

        $data = [
            'selectedCategory' => $selectedCategory
          ];

        $selectedCategory->delete();

        return redirect('category');

    }

    public function editCategoryView(Request $request){
        $id = $request->id;

        $selectedCategory = Category::where('id', $id)->first();

        $data = [
            'selectedCategory' => $selectedCategory
          ];

        return view('editCategory', $data);

    }

    public function updateCategory(Request $request){
        $id = $request->id;
        $updateCategoryName = $request->updateCategoryName;

        Category::where('id', $id)->first()->update([
            'categoryName' => $updateCategoryName
        ]);

        return redirect('category');
    }

  
}
