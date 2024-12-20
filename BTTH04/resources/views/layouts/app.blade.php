<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Sự Cố Phòng Thực Hành Tin Học</title>
    <!-- Bao gồm Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bao gồm Font Awesome (nếu sử dụng biểu tượng) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('issues.index') }}">QL Sự Cố</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item {{ request()->is('issues') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('issues.index') }}">Danh Sách Sự Cố</a>
                    </li>
                    <li class="nav-item {{ request()->is('issues/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('issues.create') }}">Thêm Sự Cố Mới</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>
    <!-- Bao gồm Bootstrap 5 JS và Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
