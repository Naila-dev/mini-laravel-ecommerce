<!-- //product listing -->
<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">MiniShop</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <a href="{{ route('shop.show', $product->id) }}" class="block border p-4 rounded hover:shadow">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-48 object-cover mb-3">
                    @endif

                    <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-600 mt-1">${{ $product->price }}</p>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
