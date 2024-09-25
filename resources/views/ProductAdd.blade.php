@vite(["resources/sass/app.scss", "resources/js/app.js"])
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h4 class="mb-4 text-center">Add Product</h4>
        <form action="/product-save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter product price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" placeholder="Enter product description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="importedDate" class="form-label">Imported Date</label>
                <input type="date" name="importedDate" id="importedDate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" id="image" class="form-control" required>
            </div>
            <!-- Nút Save được căn giữa -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
    </div>
</div>
