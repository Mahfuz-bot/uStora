<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home.index', [
            'categories' => Category::all(),
            'products' => Product::all(),
            'brands' => Brand::all(),
            'carousels' => Carousel::all()
        ]);
    }
    public function shop()
    {
        return view('frontend.shop.index', ['categories' => Category::all(), 'products' => Product::all()]);
    }
    public function cart()
    {
        return view('frontend.cart.cart', ['categories' => Category::all()]);
    }
    public function checkout()
    {
        return view('frontend.cart.checkout', ['categories' => Category::all()]);
    }
    public function singleProduct($pid)
    {
        return view('frontend.shop.single-product', [
            'categories' => Category::all(),
            'product' => Product::find($pid)
        ]);
    }
    public function categoryProduct($cid)
    {
        return view('frontend.shop.category-product', [
            'products' => Product::where('category_id', $cid)->get(),
            'categories' => Category::find($cid)
        ]);
    }
}
