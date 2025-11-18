<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Create Product</h1>

        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="border p-2 w-full"></textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="border p-2 w-full" step="0.01" required>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image">
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="is_available" value="1" checked>
                    Available
                </label>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
        </form>
    </div>
</x-app-layout>
