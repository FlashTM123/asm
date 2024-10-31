@extends('app')

@section('title', 'Add Product')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h4 class="mb-4 text-center">Add Category</h4>
        <form action="{{ route('category.save') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="category_desc" class="form-label">Category Description</label>
                <textarea name="category_desc" id="category_desc" class="form-control" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{route('category.list')}}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
</div>
@endsection
