<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }
    public function create(Request $request)
    {
        Brand::saveBrand($request);
        return back()->with('msg', "Brand added successfully");
    }
    public function manage()
    {
        return view('admin.brand.manage', ['brands' => Brand::all()]);
    }
    public function edit($bid)
    {
        return view('admin.brand.edit', ['brand' => Brand::find($bid)]);
    }
    public function updated(Request $request, $bid)
    {
        Brand::updateBrand($request, $bid);
        return redirect('brand-manage');
    }
    public function delete($bid)
    {
        Brand::find($bid)->delete();
        return redirect('brand-manage');
    }
}
