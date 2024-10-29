@extends('app')

@section('title', 'Product')

@section('content')
    <div class="container mt-5">
        <!-- Tiêu đề trang -->
        <div class="row">
            <div class="col-12">
                <h3 class="page-header text-center mb-4">Product List</h3>
            </div>
        </div>

        <!-- Nút Thêm sản phẩm -->
        <div class="row mb-3">
            <div class="col-12 text-start">
                <a href="{{ route('product.add') }}" class="btn btn-success">Add New Product</a>
            </div>
        </div>

        <!-- Bảng sản phẩm -->
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle text-center">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Imported Date</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listProduct as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->imported_date)->format('d-m-Y H:i') }}</td>
                                <td><img src="{{ $product->image }}" alt="Product Image" width="150"></td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-success me-1">Edit</a>

                                    <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
