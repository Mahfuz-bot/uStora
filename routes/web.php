<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/single-product/{pid}', [HomeController::class, 'singleProduct'])->name('single.product');
Route::get('/category-product/{cid}', [HomeController::class, 'categoryProduct'])->name('category.product');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Carousel
    Route::get('/carousel-add', [CarouselController::class, 'index'])->name('carousel.add');
    Route::post('/carousel-create', [CarouselController::class, 'create'])->name('carousel.create');
    Route::get('/carousel-manage', [CarouselController::class, 'manage'])->name('carousel.manage');
    Route::get('/carousel-edit/{cid}', [CarouselController::class, 'edit'])->name('carousel.edit');
    Route::post('/carousel-updated/{cid}', [CarouselController::class, 'updated'])->name('carousel.updated');
    Route::get('/carousel-delete/{cid}', [CarouselController::class, 'delete'])->name('carousel.delete');
    // Category
    Route::get('/category-add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category-manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category-edit/{cid}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category-updated/{cid}', [CategoryController::class, 'updated'])->name('category.updated');
    Route::get('/category-delete/{cid}', [CategoryController::class, 'delete'])->name('category.delete');
    // Brand
    Route::get('/brand-add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand-create', [BrandController::class, 'create'])->name('brand.create');
    Route::get('/brand-manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/brand-edit/{bid}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand-updated/{bid}', [BrandController::class, 'updated'])->name('brand.updated');
    Route::get('/brand-delete/{bid}', [BrandController::class, 'delete'])->name('brand.delete');
    // Product
    Route::get('/product-add', [ProductController::class, 'index'])->name('product.add');
    Route::post('/product-create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product-manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product-edit/{pid}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product-updated/{pid}', [ProductController::class, 'updated'])->name('product.updated');
    Route::get('/product-delete/{pid}', [ProductController::class, 'delete'])->name('product.delete');
});
