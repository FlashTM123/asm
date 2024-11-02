@extends('app')

@section('title', 'Product')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 500px;">
        <h4 class="mb-4 text-center">Edit Product</h4>
        <form action="/product-update" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">

            <!-- Product Name -->
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="productName" value="{{ $product->product_name }}" id="productName" class="form-control" placeholder="Enter product name" required>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" value="{{ $product->price }}" id="price" class="form-control" placeholder="Enter price" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter product description" rows="3" required>{{ $product->description }}</textarea>
            </div>

            <!-- Imported Date -->


            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" id="image"  value="{{ $product->image }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="height" class="form-label">Height</label>
                <input type="number" name="height" id="height" value="{{$product -> height}}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="watering_time_per_day" class="form-label">Watering_time_per_day</label>
                <input type="number" name="watering_time_per_day" id="watering_time_per_day" value="{{$product->watering_time_per_day}}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active" {{$product->status == 'active' ? 'selected' : ''}} class="text text-success">Active</option>
                    <option value="inactive" {{$product->status == 'inactive' ? 'selected' : ''}} class="text text-danger">Inactive</option>
                </select>
            </div>


            <!-- Save Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
