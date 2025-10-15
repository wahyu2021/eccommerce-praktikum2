<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        .pagination .page-item .page-link {
            font-size: 0.85rem;
            padding: 4px 10px;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    {{-- Navbar opsional --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            {{-- Brand/Logo sekarang mengarah ke route 'products.index' --}}
            <a class="navbar-brand" href="{{ route('products.index') }}">E-Commerce</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        {{-- Aktif jika nama route saat ini adalah 'products.index' --}}
                        <a class="nav-link {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}"
                            href="{{ route('products.index') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        {{-- Aktif jika nama route saat ini adalah 'products.category' --}}
                        <a class="nav-link {{ Route::currentRouteName() == 'products.categories' ? 'active' : '' }}"
                            href="{{ route('products.categories') }}">Category</a>
                    </li>

                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari produk..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Konten utama --}}
    <main class="container mb-4"> @yield('content')
    </main>


    <footer>
        &copy; {{ date('Y') }} E-Commerce App | Politeknik Negeri Sriwijaya
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
