@extends('admin.master')

@section('title')
    Carousel Add
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
                                        <h3 class="text-primary mb-3">Carousel Add</h3>
                                        <h6 class="text-success">{{ Session('msg') }}</h6>
                                        <form action="{{ route('carousel.create') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="croffer" class="form-label">Offer Details</label>
                                                <input type="text" class="form-control" name="croffer" id="croffer">
                                            </div>
                                            <div class="mb-3">
                                                <label for="crimage" class="form-label">Image</label>
                                                <input type="file" class="form-control" name="crimage" id="crimage">
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
