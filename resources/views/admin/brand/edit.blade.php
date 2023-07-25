@extends('admin.master')

@section('title')
    Brand Edit
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
                                        <h3 class="text-primary mb-3">Brand Edit</h3>
                                        <form action="{{ route('brand.updated', ['bid' => $brand->id]) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="bname" class="form-label">Name</label>
                                                <input type="text" class="form-control" value="{{ $brand->name }}"
                                                    name="bname" id="bname">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bstatus" class="form-label">Status</label>
                                                <input type="number" min="0" max="1" class="form-control"
                                                    value="{{ $brand->status }}" name="bstatus" id="bstatus">
                                                <label for="">1=Active, 0=Inactive</label>
                                            </div>


                                            <div class="mb-3">
                                                <img src="{{ asset($brand->image) }}" alt="brand-logo">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bimage" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="bimage" id="bimage">
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
