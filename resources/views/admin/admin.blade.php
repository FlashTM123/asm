<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>
<body>
<nav>
    <!-- Nội dung của phần nav -->
    @include('navbar.navbar')

</nav>

<section class="dashboard">
    @yield('content')
    @include('dashboard.dashboard')
</section>

<script src="{{ asset('js/admin.js') }}"></script>
@yield('js')
</body>
</html>
