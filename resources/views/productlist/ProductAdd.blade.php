@extends('app')

@section('title', 'Add Product')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container mt-lg-4">
        <h2 class="text-center mb-4">Add Product</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('product.save') }}" method="POST" class="border p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>

            <div class="mb-3">
                <label for="height" class="form-label">Height (Cm)</label>
                <input type="number" class="form-control" id="height" name="height" required>
            </div>

            <div class="mb-3">
                <label for="watering_time_per_day" class="form-label">Watering times per day</label>
                <input type="number" class="form-control" id="watering_time_per_day" name="watering_time_per_day" required>
            </div>

            <!-- Phần danh mục -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select id="category" name="category_id" class="form-select" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ route('product.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
