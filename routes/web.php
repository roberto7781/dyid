<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Register
Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('registerView');
Route::post('/create-user', [RegisterController::class, 'register'])->name('userRegistration');

// Login

route::get('/', [LoginController::class, 'showLoginView'])->name('loginView');
route::post('/user-login', [LoginController::class, 'processLogin'])->name('userLogin');

// Logout
route::post('/logout', [LoginController::class, 'logOut'])->name('logOut');

// Dashboard
route::get('/home', function(){
    return view('home');
});


// Category
route::group(['middleware' => ['auth', 'role:Admin']], function(){
    route::get('/category', [CategoryController::class, 'showCategoryView'])->name("categoryView");

    route::get('/addCategory', [CategoryController::class, 'showAddCategoryView'])->name("addCategoryView");
    route::post('/create-category', [CategoryController::class, 'addCategory'])->name('createCategory');
    
    route::get('/editCategory{id}', [CategoryController::class, 'editCategoryView'])->name("editCategoryView");
    route::post('/updateCategory{id}', [CategoryController::class, 'updateCategory'])->name("updateCategory");
    
    route::post('/deleteCategory{id}', [CategoryController::class, 'deleteCategory'])->name("deleteCategory");
});



// Product
route::group(['middleware' => ['auth', 'role:Admin']], function(){
    route::get('/product', [ProductController::class, 'showAdminProductView'])->name("adminProductView");

    route::get('/addProduct', [ProductController::class, 'showAddProductView'])->name("addProductView");
    route::post('/create-product', [ProductController::class, 'addProduct'])->name('createProduct');
    
    route::get('/editProduct{id}', [ProductController::class, 'editProductView'])->name("editProductView");
    route::post('/updateProduct{id}', [ProductController::class, 'updateProduct'])->name("updateProduct");
    
    route::post('/deleteProduct{id}', [ProductController::class, 'deleteProduct'])->name("deleteProduct");
});

route::get('/search',[ProductController::class, 'searchProducts'])->name('showSearchView');
route::get('/home', [ProductController::class, 'showProductView'])->name("productView");
route::get('/productDetail', [ProductController::class, 'showProductDetailView'])->name('productDetailView');


// Cart
route::post('/addToCart{id}', [CartController::class, 'addToCart'])->name('addToCart');
route::get('/viewCart', [CartController::class, 'showCartView'])->name('cartView');

route::post('/deleteCart{id}', [CartController::class, 'deleteCart'])->name("deleteCart");
route::get('/editCart{id}', [CartController::class, 'editCartView'])->name("editCartView");
route::post('/updateCart{id}', [CartController::class, 'updateCart'])->name("updateCart");