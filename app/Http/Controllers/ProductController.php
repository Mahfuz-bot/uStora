<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index', ['categories' => Category::all(), 'brands' => Brand::all()]);
    }
    public function create(Request $request)
    {
        Product::saveProduct($request);
        return back()->with('msg', 'Product added successfully');
    }
    public function manage()
    {
        return view('admin.product.manage', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }
    public function edit($pid)
    {
        return view('admin.product.edit', [
            'product' => Product::find($pid),
            'categories' => Category::all(),
            'brands' => Brand::all()
        ]);
    }
    public function updated(Request $request, $pid)
    {
        Product::updateCategory($request, $pid);
        return redirect('product-manage');
    }
    public function delete($pid)
    {
        Product::find($pid)->delete();
        return redirect('product-manage');
    }
}
