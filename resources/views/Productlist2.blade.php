@vite(["resources/sass/app.scss", "resources/js/app.js"])

<div class="container mt-5">
    <!-- Tiêu đề trang -->
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-4">Product List 2</h3>
        </div>
    </div>

    <!-- Nút Thêm sản phẩm -->
    <div class="row mb-3">
        <div class="col-12 text-start">
            <a href="/product-add" class="btn btn-success btn-sm">Add New Product</a>
        </div>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover table-bordered align-middle text-center">
                <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Imported Date</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listProduct as $obj)
                    <tr>
                        <td>{{$obj->id}}</td>
                        <td>{{$obj->product_name}}</td>
                        <td>${{ number_format($obj->price) }}</td>
                        <td>{{$obj->description}}</td>
                        <td>{{ \Carbon\Carbon::parse($obj->imported_date)->format('d-m-Y H:i') }}</td>
                       <td><img src="{{$obj -> image}}" alt="" width="200"></td>


                        <td>
                            <form action="{{ url('/product-edit/' . $obj->id) }}" style="display:inline-block;">
                                <button type="submit" class="btn btn-success btn-sm">Edit</button>
                            </form>

                            <form action="{{ url('/product-list2/delete/' . $obj->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
