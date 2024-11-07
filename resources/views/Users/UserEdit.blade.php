@extends('app')

@section('title', 'Edit User')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container mt-lg-4">
        <h2 class="text-center mb-4">Edit User</h2>

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="border p-4 rounded shadow-sm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="Name" value="{{ old('Name', $user->Name) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="Phone" value="{{ old('Phone', $user->Phone) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="Email" value="{{ old('Email', $user->Email) }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="Password" value="{{ old('Password', $user->Password) }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="Address" value="{{ old('Address', $user->Address) }}">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="Role" class="form-select" required>
                    <option value="user" {{ $user->Role === 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->Role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('user.list') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
