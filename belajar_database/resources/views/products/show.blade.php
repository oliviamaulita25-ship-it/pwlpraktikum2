<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto max-w-3xl px-6 py-10">

        <h1 class="text-3xl font-bold mb-6">Product Detail</h1>

        <div class="bg-white rounded shadow p-6">
            <table class="w-full">
                <tr class="border-b">
                    <th class="text-left py-3">Product Name</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-3">Product Code</th>
                    <td>{{ $product->code }}</td>
                </tr>
                <tr class="border-b">
                    <th class="text-left py-3">Stock</th>
                    <td>{{ $product->stock }}</td>
                </tr>
                <tr>
                    <th class="text-left py-3">Price</th>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>

        <div class="mt-4 flex gap-2">
            <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 rounded">
                Back
            </a>

            @can('manage-products')
                <a href="{{ route('products.edit', $product) }}" class="px-4 py-2 bg-amber-500 text-white rounded">
                    Edit Product
                </a>
            @endcan
        </div>

    </div>
</body>

</html>
