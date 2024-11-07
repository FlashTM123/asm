@extends('app')

@section('title', 'Product')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="page-header text-center mb-4">Product List</h3>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 text-start">
                <a href="{{ route('product.add') }}" class="btn btn-success">Add New Product</a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <form action="{{ route('product.list') }}" method="GET">
                    <select name="category_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-14">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle text-center" style="font-size: 14px;">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Height (cm)</th>
                            <th>Watering Times/Day</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listProduct as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ number_format($product->price) }} VND</td>
                                <td class="text-truncate" style="max-width: 150px;">{{ $product->description }}</td>
                                <td>{{ $product->height }} cm</td>
                                <td>{{ $product->watering_time_per_day }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>
                                    <span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                                <td><img src="{{ $product->image }}" alt="Product Image" class="img-fluid rounded" style="max-width: 80px;"></td>
                                <td>{{ \Carbon\Carbon::parse($product->created_at)->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($product->updated_at)->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline-success me-1">Edit</a>
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
