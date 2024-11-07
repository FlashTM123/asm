@extends('app')

@section('title','Customer list')

@section('content')
    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="page-header text-center mb-4">Customer list</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered align-middle text-center">
                        <thread class="table-dark">
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thread>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td class="text-truncate" style="max-width: 200px">{{$customer->address}}</td>
                                <td>
                                    <span class="badge {{$customer->status == 'active' ? 'bg-success' : 'bg-danger'}}">
                                        {{ ucfirst($customer->status) }}
                                    </span>
                                </td>

                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($customer->updated_at)->setTimezone('Asia/Bangkok')->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <form action="{{ route('customer.delete', $customer->id) }}" method="POST" style="display:inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
