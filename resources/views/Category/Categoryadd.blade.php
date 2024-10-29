@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include("Menu")
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h4 class="mb-4 text-center">Add Product</h4>
        <form action="/category-save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Category Name</label>
                <input type="text" name="CategoryName" id="CategoryName" class="form-control" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter category description" rows="3" required></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
    </div>
</div>
