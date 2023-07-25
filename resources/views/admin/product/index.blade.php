@extends('admin.master')

@section('title')
    Product Add
@endsection

@section('content')
    <section class="pt-5 px-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-light text-dark mb-3">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-primary mb-3">Product Add</h3>
                                        <h6 class="text-success">{{ Session('msg') }}</h6>
                                        <form action="{{ route('product.create') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="categoryId" class="mb-2">Choose Category</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="categoryId">
                                                    <option selected>Select category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="brandId" class="mb-2">Choose Brand</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="brandId">
                                                    <option selected>Select brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pname" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="pname" id="pname">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pprice" class="form-label">Price</label>
                                                <input type="text" class="form-control" name="pprice" id="pprice">
                                            </div>
                                            <div class="mb-3">
                                                <label for="pimage" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="pimage" id="pimage">
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
