<!DOCTYPE html>
<html>
<head>
    <title>Quản Lý Sự Cố Phòng Thực Hành Tin Học</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('issues.index') }}">Quản Lý Sự Cố</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('issues') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('issues.index') }}">Danh Sách Sự Cố</a>
                </li>
                <li class="nav-item {{ request()->is('issues/create') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('issues.create') }}">Thêm Sự Cố Mới</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
