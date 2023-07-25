@extends('admin.master')

@section('title')
    Products DataTable
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.add') }}">Product Add</a></li>
                <li class="breadcrumb-item active">Product Manage</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Products DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $product->category_id)
                                            <td>{{ $category->name }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($brands as $brand)
                                        @if ($brand->id == $product->brand_id)
                                            <td>{{ $brand->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt="image"
                                            style="width: 50px; height:50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', ['pid' => $product->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
