@extends('app')

@section('title', 'Edit Category')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 500px;">
        <h4 class="mb-4 text-center">Edit Category</h4>
        <form action="/category-update" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">


            <div class="mb-3">
                <label for="productName" class="form-label">Category Name</label>
                <input type="text" name="category_name" value="{{ $category->category_name }}" id="category_name" class="form-control" placeholder="Enter category name" required>

            </div>




            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="category_desc" id="category_desc" class="form-control" placeholder="Enter product description" rows="3" required>{{ $category->category_desc }}</textarea>
            </div>



            <!-- Save Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('category.list')}}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
