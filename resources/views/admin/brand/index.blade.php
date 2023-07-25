@extends('admin.master')

@section('title')
    Brand Add
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
                                        <h3 class="text-primary mb-3">Brand Add</h3>
                                        <h6 class="text-success">{{ Session('msg') }}</h6>
                                        <form action="{{ route('brand.create') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="bname" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="bname" id="bname">
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
