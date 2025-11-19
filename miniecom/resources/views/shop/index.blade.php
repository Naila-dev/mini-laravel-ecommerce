<x-app-layout>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">MiniShop</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="border p-4 rounded hover:shadow flex flex-col">
                    <a href="{{ route('shop.show', $product->id) }}" class="block mb-3">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 class="w-full h-48 object-cover mb-3">
                        @endif

                        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-600 mt-1">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    </a>

                    @if($product->is_available)
                        <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-auto">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button class="mt-2 px-3 py-2 bg-green-600 text-white rounded w-full">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <p class="mt-2 text-red-600 font-semibold">Unavailable</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
