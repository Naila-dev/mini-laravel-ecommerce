<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

        <form method="POST"
              action="{{ route('admin.products.update', $product->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $product->name }}"
                       class="border p-2 w-full" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="border p-2 w-full">
                    {{ $product->description }}
                </textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" value="{{ $product->price }}"
                       class="border p-2 w-full" step="0.01" required>
            </div>

            <div class="mb-3">
                <label>Current Image</label><br>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="100">
                @else
                    <p>No image</p>
                @endif
            </div>

            <div class="mb-3">
                <label>New Image</label>
                <input type="file" name="image">
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox"
                           name="is_available"
                           value="1"
                           {{ $product->is_available ? 'checked' : '' }}>
                    Available
                </label>
            </div>

            <button class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
        </form>
    </div>
</x-app-layout>
