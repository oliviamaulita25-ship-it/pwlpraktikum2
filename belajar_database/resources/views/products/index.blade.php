<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Product</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto max-w-6xl px-6 py-10">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Product</h1>

            <div class="flex gap-2">
                @can('manage-products')
                    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Add Product
                    </a>
                @endcan

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Code</th>
                        <th class="px-4 py-3">Stock</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
                        <tr class="border-t">
                            <td class="px-4 py-3">
                                {{ $products->firstItem() + $loop->index }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $product->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $product->code }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $product->stock }}
                            </td>

                            <td class="px-4 py-3">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex gap-2 flex-wrap">

                                    <a href="{{ route('products.show', $product) }}"
                                        class="px-3 py-1 bg-blue-600 text-white rounded">
                                        Detail
                                    </a>

                                    @can('manage-products')
                                        <a href="{{ route('products.edit', $product) }}"
                                            class="px-3 py-1 bg-amber-500 text-white rounded">
                                            Edit
                                        </a>

                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center">
                                Data empty
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>

    </div>
</body>

</html>
