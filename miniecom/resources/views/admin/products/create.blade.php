<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Add Product</h1>

        <form method="POST"
              action="{{ route('admin.products.store') }}"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="block mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="border p-2 w-full" required>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Description</label>
                <textarea name="description" rows="3"
                          class="border p-2 w-full">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Price</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                       class="border p-2 w-full" required>
            </div>

            <div class="mb-3">
                <label class="block mb-1">Image</label>
                <input type="file" name="image" class="border p-2 w-full">
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="is_available" value="1" checked>
                    Available
                </label>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Create</button>
        </form>
    </div>
</x-app-layout>
