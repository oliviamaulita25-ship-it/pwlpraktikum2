<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Product</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto max-w-3xl px-6 py-10">
        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>
        <form action="{{ route('products.update', $product) }}" method="POST"
            class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    class="w-full border p-2 rounded" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1">Code</label>
                <input type="text" value="{{ $product->code }}" class="w-full border p-2 rounded bg-gray-100"
                    readonly>
            </div>
            <div>
                <label class="block mb-1">Price</label>
                <input type="number" name="price" step="0.01" min="0"
                    value="{{ old('price', $product->price) }}" class="w-full border p-2 rounded" required>
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block mb-1">Stock</label>
                <input type="number" name="stock" min="0" value="{{ old('stock', $product->stock) }}"
                    class="w-full border p-2 rounded" required>
                @error('stock')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                    Save Changes
                </button>
                <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-200 rounded">
                    Back
                </a>
            </div>
        </form>
    </div>
</body>

</html>
