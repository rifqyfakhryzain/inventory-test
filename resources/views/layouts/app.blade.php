<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory App</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="{{ route('dashboard') }}">
                Inventory App
            </a>

            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('produk.index') }}">
                    Produk
                </a>

                <a class="nav-link" href="{{ route('transaksi.index') }}">
                    Transaksi
                </a>
            </div>

        </div>
    </nav>

    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>

</body>

</html>
