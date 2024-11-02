<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
<div class="card p-5 shadow-sm" style="width: 400px;">
    <h3 class="text-center mb-4">Admin Login</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="Email" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" id="Password" class="form-control" placeholder="Enter password" required minlength="6">
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
