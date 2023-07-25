@extends('admin.master')

@section('title')
    Category Add
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
                                        <h3 class="text-primary mb-3">Category Add</h3>
                                        <h6 class="text-success">{{ Session('msg') }}</h6>
                                        <form action="{{ route('category.create') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="cname" class="form-label">Name</label>
                                                <input type="text" class="form-control" name="cname" id="cname">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cimage" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="cimage" id="cimage">
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
