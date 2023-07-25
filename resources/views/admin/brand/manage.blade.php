@extends('admin.master')

@section('title')
    Brands DataTable
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Brand</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('brand.add') }}">Brand Add</a></li>
                <li class="breadcrumb-item active">Brand Manage</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Brands DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <img src="{{ asset($brand->image) }}" alt="image"
                                            style="width: 50px; height:50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('brand.edit', ['bid' => $brand->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('brand.delete', ['bid' => $brand->id]) }}"
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
