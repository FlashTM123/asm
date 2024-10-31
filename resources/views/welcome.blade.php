@vite(["resources/sass/app.scss", "resources/js/app.js"])
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="https://marketplace.canva.com/EADzKAvfVrM/2/0/1600w/canva-tr%E1%BA%AFng-v%C3%A0-m%C3%A0u-kem-l%C3%A1-c%E1%BA%A3nh-quan-bi%E1%BB%83u-tr%C6%B0ng-xNVaLNkS2bw.jpg" alt="" width="50px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- Banner Section using Bootstrap -->
<div class="container-fluid p-0">
    <div class="bg-image" style="background-image: url('https://epma.vn/wp-content/uploads/2023/05/R.jpg'); height: 75vh; background-size: cover; background-position: center;">
        <div class="h-100 d-flex justify-content-center align-items-center text-white text-center bg-dark bg-opacity-50">
            <div>
                <h1>Chào mừng đến với Cỏ ba lá</h1>
                <p>Noi bản có thể chọn cây cảnh đẹp nhất</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
