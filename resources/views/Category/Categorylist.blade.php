
@vite(["resources/sass/app.scss", "resources/js/app.js"])
@include("Menu")
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-4">Category</h3>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 text-start">
            <a href="/category-add" class="btn btn-success btn-sm">Add new category</a>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover table-bordered align-middle text-center">
                <thread class="table-success">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>

                        <th></th>
                    </tr>
                    @foreach($listcategory as  $obj)
                        <td>{{$obj -> id}}</td>
                        <td>{{$obj -> name}}</td>
                        <td>{{$obj -> description}}</td>
                        <td>
                            <form action="{{ url('/category-edit/' . $obj->id) }}" style="display:inline-block;">
                                <button type="submit" class="btn btn-success btn-sm">Edit</button>
                            </form>

                            <form action="{{ url('/category-list/delete/' . $obj->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                        </td>
                    @endforeach
                </thread>
            </table>
        </div>
    </div>
</div>

