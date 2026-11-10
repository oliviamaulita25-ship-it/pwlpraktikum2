<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand">Aplikasi Manajemen Produk</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h3>Dashboard Admin</h3>
                <p>Selamat datang, {{ Auth::user()->name }}.</p>
                <p>Anda login sebagai Administrator.</p>

                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    Kelola Produk
                </a>
            </div>
        </div>
    </div>

</body>

</html>
