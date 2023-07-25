@extends('admin.master')

@section('title')
    Carousels DataTable
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Carousel</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('carousel.add') }}">Carousel Add</a></li>
                <li class="breadcrumb-item active">Carousel Manage</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Carousels DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Offer</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($carousels as $carousel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $carousel->offer }}</td>
                                    <td>{{ $carousel->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <img src="{{ asset($carousel->image) }}" alt="image"
                                            style="width: 100%; height:50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('carousel.edit', ['cid' => $carousel->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('carousel.delete', ['cid' => $carousel->id]) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
