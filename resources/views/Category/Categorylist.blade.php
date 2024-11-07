@extends('app')

@section('title', "Category")

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-4">Category</h3>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 text-start">
                <a href="{{ url('/category-add') }}" class="btn btn-success btn-sm">Add new category</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-striped table-hover table-bordered align-middle text-center">
                    <thead class="table-success">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listcategory as $obj)
                        <tr>
                            <td>{{ $obj->id }}</td>
                            <td>{{ $obj->category_name }}</td>
                            <td>{{ $obj->category_desc }}</td>
                            <td>{{ \Carbon\Carbon::parse($obj->created_at)->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}</td>
                            <td>{{ \Carbon\Carbon::parse($obj->updated_at)->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
