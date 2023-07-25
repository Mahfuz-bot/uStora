<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        return view('admin.carousel.index');
    }
    public function create(Request $request)
    {
        Carousel::saveCarousel($request);
        return back()->with('msg', "Carousel added successfully");
    }
    public function manage()
    {
        return view('admin.carousel.manage', ['carousels' => Carousel::all()]);
    }
    public function edit($cid)
    {
        return view('admin.carousel.edit', ['carousel' => Carousel::find($cid)]);
    }
    public function updated(Request $request, $cid)
    {
        Carousel::updateCarousel($request, $cid);
        return redirect('carousel-manage');
    }
    public function delete($cid)
    {
        Carousel::find($cid)->delete();
        return redirect('carousel-manage');
    }
}
