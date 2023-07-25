<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create(Request $request)
    {
        Category::saveCategory($request);
        return back()->with('msg', "Category created successfully");
    }
    public function manage()
    {
        return view('admin.category.manage', ['categories' => Category::all()]);
    }
    public function edit($cid)
    {
        return view('admin.category.edit', ['category' => Category::find($cid)]);
    }
    public function updated(Request $request, $cid)
    {
        Category::updateCategory($request, $cid);
        return redirect('category-manage');
    }
    public function delete($cid)
    {
        Category::find($cid)->delete();
        return redirect('category-manage');
    }
}
