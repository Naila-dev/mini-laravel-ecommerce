<x-app-layout>
    <div class="p-6">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Products</h1>

            <a href="{{ route('admin.products.create') }}"
               class="px-4 py-2 bg-blue-600 text-white rounded">
                + Add Product
            </a>
        </div>

        @if (session('success'))
            <p class="bg-green-200 text-green-800 p-2 rounded mb-3">
                {{ session('success') }}
            </p>
        @endif

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Available</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->id }}</td>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2">${{ $product->price }}</td>
                        <td class="border px-4 py-2">
                            {{ $product->is_available ? 'Yes' : 'No' }}
                        </td>
                        <td class="border px-4 py-2">

                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="text-blue-600 mr-3">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600"
                                        onclick="return confirm('Delete product?')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</x-app-layout>
