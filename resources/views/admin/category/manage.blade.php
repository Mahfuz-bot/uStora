@extends('admin.master')

@section('title')
    Categories DataTable
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Manage Category</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.add') }}">Category Add</a></li>
                <li class="breadcrumb-item active">Category Manage</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Categories DataTable
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <img src="{{ asset($category->image) }}" alt="image"
                                            style="width: 50px; height:50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', ['cid' => $category->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('category.delete', ['cid' => $category->id]) }}"
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
