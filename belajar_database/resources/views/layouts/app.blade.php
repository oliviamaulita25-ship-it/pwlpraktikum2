<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CRUD Product')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <main class="container mx-auto max-w-6xl px-6 py-10">
        @yield('content')
    </main>
</body>

</html>
