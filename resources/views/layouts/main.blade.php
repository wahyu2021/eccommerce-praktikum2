<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Pastikan body penuh layar dan gunakan flexbox */
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        main {
            flex: 1;
            /* Isi ruang antara header dan footer */
        }

        footer {
            background-color: #0d6efd;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
            /* Dorong footer ke bawah */
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 ">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>
        </div>
    </nav>
    <main class="container mb-4"> @yield('content')
    </main>


    <footer>
        &copy; {{ date('Y') }} E-Commerce App | Politeknik Negeri Sriwijaya
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
