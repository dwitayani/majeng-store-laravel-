<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" type="image/png">

    <title>@yield('title')</title>
</head>

<body>
    <div class="row">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 min-vh-100" id="sidebar">
            <div class="d-flex flex-column flex-shrink-0">
                <img src="{{ asset('assets/img/majenglogo.png') }}" alt=""
                    style="max-width: 100%; height: auto;">
                <hr>
                <ul class="nav nav-pills flex-column mb-auto justify-content-between">
                    <li class="nav-item my-2">
                        <a href="/dashboard" class="nav-link">
                            <i class="fas fa-house"></i> <b>Dashboard</b>
                        </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="/penjualan" class="nav-link">
                            <i class="fas fa-dollar-sign"></i> <b>Penjualan</b>
                        </a>
                    </li>
                    <li class="nav-item my-2">
                        <a href="/produk" class="nav-link">
                            <i class="fas fa-cart-shopping"></i> <b>Stok Barang</b>
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item my-2">
                        <a href="/pelanggan" class="nav-link">
                            <i class="fas fa-user-friends"></i> <b>Customers</b>
                        </a>
                    </li>
                    @if (Auth::user()->role == 'admin')
                        <hr>
                        <li class="nav-item my-2">
                            <a href="/pengguna" class="nav-link">
                                <i class="fas fa-user-friends"></i> <b>Pengguna (admin)</b>
                            </a>
                        </li>
                    @endif
                </ul>

                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('assets/img/icon.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                        @if (Auth::user()->role == 'admin')
                            <p>admin</p>
                        @endif
                        @if (Auth::user()->role == 'petugas')
                            <p>petugas</p>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-12 col-md-9">
            <main class="container" id="main">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
