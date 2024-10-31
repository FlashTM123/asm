@extends('app')

@section('title', 'Dashboard')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .widget {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .widget:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .widget .widget-icon {
            font-size: 2rem;
            color: #fff;
            border-radius: 50%;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }

        .widget.blue .widget-icon {
            background-color: #007bff;
        }

        .widget.orange .widget-icon {
            background-color: #fd7e14;
        }

        .widget.teal .widget-icon {
            background-color: #20c997;
        }

        .widget.red .widget-icon {
            background-color: #dc3545;
        }

        .widget.green .widget-icon {
            background-color: #28a745;
        }

        .widget.yellow .widget-icon {
            background-color: #ffc107;
        }

        .widget-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .widget .large {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .widget .text-muted {
            color: #6c757d;
        }
    </style>

    <div class="d-flex">
        @include("navbar.navbar")
    </div>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-lg-12">
                <h1 class="page-header text-center mb-4">Admin Dashboard</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('product.list') }}" class="widget blue d-flex flex-column align-items-center">
                    <div class="widget-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="widget-text text-center">
                        <h5 class="widget-title">Products</h5>
                        <p class="large">{{ $totalProducts }}</p>
                        <small class="text-muted">Last updated: {{ \Carbon\Carbon::now()->diffForHumans() }}</small>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4">
                <a href="{{ route('category.list') }}" class="widget teal d-flex flex-column align-items-center">
                    <div class="widget-icon">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <div class="widget-text text-center">
                        <h5 class="widget-title">Categories</h5>
                        <p class="large">{{ $totalCategories }}</p>
                        <small class="text-muted">Last updated: {{ \Carbon\Carbon::now()->diffForHumans() }}</small>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('user.list') }}" class="widget teal d-flex flex-column align-items-center">
                    <div class="widget-icon">
                        <i class="fa-solid fa-users"></i> <!-- Thay đổi biểu tượng thành 'fa-users' -->
                    </div>
                    <div class="widget-text text-center">
                        <h5 class="widget-person">Users</h5>
                        <p class="large">{{ $totalUsers }}</p>
                        <small class="text-muted">Last updated: {{ \Carbon\Carbon::now()->diffForHumans() }}</small>
                    </div>
                </a>
            </div>


            <!-- Bạn có thể thêm nhiều widget khác tại đây -->
        </div>
    </div>

    <!-- Đảm bảo rằng bạn đã bao gồm tệp JS của Bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
