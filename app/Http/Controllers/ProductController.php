<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function getAllProduct()
    {
        // To get all the product from the database
        $allProduct = Product::all();


        return $allProduct;
    }

    public function showAddProductView()
    {
        // Creating a category controller to get all the category
        $cc = new CategoryController();

        return view('addProduct', $cc->getAllCategory());
    }

    public function showAdminProductView()
    {
        // Putting all of the product from into an array
        $data = [
            'products' => $this->getAllProduct()
        ];

        return view("viewProduct", $data);
    }


    public function showProductView()
    {
        // Putting all of the product from into an array
        $data = [

            // Pagination (Each page have 6 product)
            'products' => Product::paginate(6)
        ];

        return view("home", $data);
    }

    public function showProductDetailView(Request $request)
    {
        // Get the product id that want to be shown
        $id = $request->id;

        // Select the product
        $selectedProduct = Product::where('id', $id)->first();

        // Put the product information into an array
        $data = [
            'selectedProduct' => $selectedProduct
        ];

        return view('productDetail', $data);
    }



    public function addProduct(Request $request)
    {
        // Product information validation
        $request->validate([
            'productName' => 'required|min:5|unique:products',
            'productDescription' => 'required|min:50',
            'productPrice' => 'required|numeric|min:0',
            'categoryID' => 'required',
            'productImage' => 'required|image|mimes:jpg,jpeg'

        ]);

        // Getting all the data inputted by the user
        $data =  $request->all();

        // Request the file uploaded
        $file = $request->file('productImage');

        // Store the image in the storage
        Storage::putFileAs('public/images', $file, $file->getClientOriginalName());

        // Creating a new product (Inserting it into database)
        Product::create([

            'productName' => $data['productName'],
            'productDescription' => $data['productDescription'],
            'productPrice' => $data['productPrice'],
            'categoryID' => $data['categoryID'],
            'productImage' => $file->getClientOriginalName()
        ]);


        return redirect('product');
    }


    // To check whether a product use the same image
    public function checkImage($selectedProduct)
    {
        $data = $this->getAllProduct();

        $counter = 0;

        foreach ($data as $product) {

            if ($product->productImage == $selectedProduct->productImage) {
                $counter++;
            }
        }

        return $counter;
    }


    public function deleteProduct(Request $request)
    {

        // Get the product id that want to be deleted
        $id = $request->id;

        // Select the product
        $selectedProduct = Product::where('id', $id)->first();

        // To check whether the image can be deleted or not
        if (($this->checkImage($selectedProduct)) == 1) {

            $filename = $selectedProduct->productImage;

            // Check whether the image exist in the storage or not
            if (Storage::exists('public/images/' . $filename . '')) {

                // Deleting the image
                Storage::delete('public/images/' . $filename . '');
            }
        }

        // Delete product from the database
        $selectedProduct->delete();

        return redirect('product');
    }


    public function editProductView(Request $request)
    {

        // Creating a new category controller
        $cc = new CategoryController();

        // Get the product id that want to be updated
        $id = $request->id;


        // Select the product
        $selectedProduct = Product::where('id', $id)->first();

        // Put the product information into an array
        $data1 = [
            'selectedProduct' => $selectedProduct
        ];

        return view('editProduct', $cc->getAllCategory(), $data1);
    }

    public function updateProduct(Request $request)
    {

        // Get the product id that want to be updated
        $id = $request->id;

        // Product information validation
        $request->validate([
            'updateProductName' => 'required|min:5|unique:products,productName,' . $id,
            'updateProductDescription' => 'required|min:50',
            'updateProductPrice' => 'required|numeric|min:0',
            'updateCategoryID' => 'required',
            'updateProductImage' => 'required|image|mimes:jpg,jpeg'

        ]);

        // Getting all the data inputted by the user
        $data = $request->all();


        $updateProductName = $request->updateProductName;
        $updateProductCategory = $data['updateCategoryID'];
        $updateProductDescription = $request->updateProductDescription;
        $updateProductImage =  $request->file('updateProductImage')->getClientOriginalName();
        $updateProductPrice = $request->updateProductPrice;

        // Select the product
        $selectedProduct = Product::where('id', $id)->first();

        // To check whether the image can be deleted or not
        if (($this->checkImage($selectedProduct)) == 1) {

            $filename = $selectedProduct->productImage;

            // Check whether the image exist in the storage or not
            if (Storage::exists('public/images/' . $filename . '')) {

                // Deleting the image
                Storage::delete('public/images/' . $filename . '');
            }
        }

        // Updating the product in database
        $selectedProduct->update([
            'productName' => $updateProductName,
            'categoryID' => $updateProductCategory,
            'productPrice' => $updateProductPrice,
            'productImage' => $updateProductImage,
            'productDescription' =>  $updateProductDescription
        ]);

        // Store the file in the storage
        Storage::putFileAs('public/images', $request->file('updateProductImage'), $updateProductImage);

        return redirect('product');
    }


    public function searchProducts(Request $request)
    {
        // Search specific product name
        $selectedProducts = Product::where('productName', 'like', "%$request->query_param%")->paginate(6);

        // Put the product information into an array
        $data = [
            'products' => $selectedProducts
        ];

        return view("home", $data);
    }
}
