@extends('app')

@section('title', 'User List')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-4">User List</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 text-lg-start">
                <a href="{{route('user.add')}}" class="btn btn-success">Add New User</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle text-center">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->Name }}</td>
                                <td>{{ $user->Phone }}</td>
                                <td>{{ $user->Email }}</td>
                                <td>{{ ucfirst($user->Role) }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <form action="{{route('user.delete',$user->id)}}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
