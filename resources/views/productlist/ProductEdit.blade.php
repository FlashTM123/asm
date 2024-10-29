@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include("Menu")
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
            <div class="mb-3">
                <label for="imported_date" class="form-label">Imported Date</label>
                <input type="datetime-local" name="imported_date" value="{{ \Carbon\Carbon::parse($product->imported_date)->format('Y-m-d\TH:i') }}" id="imported_date" class="form-control" required>
            </div>

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" id="image"  value="{{ $product->image }}" class="form-control" required>
            </div>

            <!-- Save Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </form>
    </div>
</div>
