@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include("Menu")
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 500px;">
        <h4 class="mb-4 text-center">Edit Product</h4>
        <form action="/category-update" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">


            <div class="mb-3">
                <label for="productName" class="form-label">Category Name</label>
                <input type="text" name="categoryName" value="{{ $category->name }}" id="categoryName" class="form-control" placeholder="Enter category name" required>

            </div>




            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter product description" rows="3" required>{{ $category->description }}</textarea>
            </div>



            <!-- Save Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
    </div>
</div>
