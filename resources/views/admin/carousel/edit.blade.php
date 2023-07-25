@extends('admin.master')

@section('title')
    Edit Carousel
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
                                        <h3 class="text-primary mb-3">Edit Carousel</h3>
                                        {{-- <h6 class="text-success">{{ Session('msg') }}</h6> --}}
                                        <form action="{{ route('carousel.updated', ['cid' => $carousel->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="croffer" class="form-label">Offer</label>
                                                <input type="text" class="form-control" value="{{ $carousel->offer }}"
                                                    name="croffer" id="croffer">
                                            </div>
                                            <div class="mb-3">
                                                <label for="crstatus" class="form-label">Status</label>
                                                <input type="number" min="0" max="1" class="form-control"
                                                    value="{{ $carousel->status }}" name="crstatus" id="crstatus">
                                                <label for="">1=Active, 0=Inactive</label>
                                            </div>
                                            <div class="mb-3">
                                                <img src="{{ asset($carousel->image) }}" alt="image"
                                                    style="width: 100%; height: 200px">
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
