<!-- single product page -->
 <x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row gap-6">
            @if($product->image)
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         class="w-full h-80 object-cover rounded">
                </div>
            @endif

            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                <p class="text-xl text-green-700 font-semibold mb-4">
                    ${{ number_format($product->price, 2) }}
                </p>

                @if($product->description)
                    <p class="text-gray-700 mb-4">
                        {{ $product->description }}
                    </p>
                @endif

                @if(!$product->is_available)
                    <p class="text-red-600 font-semibold mb-4">Currently unavailable</p>
                @else
                    <form method="POST" action="{{ route('cart.add', $product->id) }}" class="space-y-3">
                        @csrf
                        <div>
                            <label class="block mb-1">Quantity</label>
                            <input type="number" name="quantity" value="1" min="1"
                                   class="border p-2 w-24">
                        </div>

                        <button class="px-4 py-2 bg-green-600 text-white rounded">
                            Add to Cart
                        </button>
                    </form>
                @endif

                <div class="mt-6">
                    <a href="{{ route('shop.index') }}" class="text-blue-600">&larr; Back to shop</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>