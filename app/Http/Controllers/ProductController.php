<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    //
   
    public function getAllProduct(){
        $allProduct = Product::all();

      
        return $allProduct;
    }

    public function showAddProductView(){

        $cc = new CategoryController();

        return view('addProduct', $cc->getAllCategory());
    }

    public function showAdminProductView(){

        $data = [
            'products' => $this->getAllProduct()
       ];

        return view("viewProduct", $data);
    }

    public function showProductView(){
        $data = [
            'products' => $this->getAllProduct()
       ];

        return view("home", $data);
    }

    public function showProductDetailView(Request $request){
        $id = $request->id;

        $selectedProduct = Product::where('id', $id)->first();

        $data = [
            'selectedProduct' => $selectedProduct
          ];

        return view('productDetail', $data);

    }



    public function addProduct(Request $request){
 
        $request->validate([
            'productName' => 'required|min:5',
            'productDescription' => 'required|min:50',
            'productPrice' => 'required|numeric|min:0|not_in:0',
            'categoryID' => 'required',
            'productImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg'

        ]);


        $data =  $request->all();
        
       $request->productImage->move(public_path('images'), $request->file('productImage')->getClientOriginalName());
       
       $imageName = $request->file('productImage')->getClientOriginalName();

        Product::create([
            
        'productName' => $data['productName'],
        'productDescription' => $data['productDescription'],
        'productPrice' => $data['productPrice'],
        'categoryID' => $data['categoryID'],
        'productImage' => $imageName
    ]);
            

        return redirect('/');
    }


    public function checkImage($selectedProduct){
        $data = $this->getAllProduct();
     
        $counter = 0;

        foreach($data as $product){

          if($product->productImage == $selectedProduct->productImage){
              $counter++;
          }

        }

        return $counter;
    }

    public function deleteProduct(Request $request){
        $id = $request->id;

        $selectedProduct = Product::where('id', $id)->first();

        $data = [
            'selectedProduct' => $selectedProduct
          ];

          if(($this->checkImage($selectedProduct)) > 1){

            $filename = public_path($selectedProduct->productImage);

            if(File::exists($filename)) {
                File::delete($filename);
            }

          }
      
        $selectedProduct->delete();

        return redirect('product');

    }


    public function editProductView(Request $request){

        $cc = new CategoryController();

        $id = $request->id;

        $selectedProduct = Product::where('id', $id)->first();

        if(($this->checkImage($selectedProduct)) > 1){

            $filename = public_path($selectedProduct->productImage);

            if(File::exists($filename)) {
                File::delete($filename);
            }

          }

        $data1 = [
            'selectedProduct' => $selectedProduct
          ];

        return view('editProduct', $cc->getAllCategory(), $data1);

    }

    public function updateProduct(Request $request){
        $id = $request->id;

        $data = $request->all();
        

        $updateProductName = $request->updateProductName;
        $updateProductCategory = $data['updateCategoryID'];
        $updateProductDescription = $request->updateProductDescription;
        $updateProductImage =  $request->file('updateProductImage')->getClientOriginalName();
        $updateProductPrice = $request->updateProductPrice;

        $selectedProduct = Product::where('id', $id)->first();

        $selectedProduct->update([
            'productName' => $updateProductName,
            'categoryID' => $updateProductCategory,
            'productPrice' => $updateProductPrice,
            'productImage' => $updateProductImage,
            'productDescription' =>  $updateProductDescription
        ]);
    
        
       
        $request->updateProductImage->move(public_path('images'), $request->file('updateProductImage')->getClientOriginalName());
       

      
      
 
        
        return redirect('product');
    }


}
