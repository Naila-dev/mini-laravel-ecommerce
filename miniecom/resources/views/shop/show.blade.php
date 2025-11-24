<x-app-layout>
    <div class="py-10 px-6 max-w-5xl mx-auto">
        <div class="bg-white p-6 rounded-xl shadow-sm">

            <div class="flex flex-col md:flex-row gap-10">

                @if($product->image)
                    <div class="md:w-1/2">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="w-full h-96 object-cover rounded-lg shadow">
                    </div>
                @endif

                <div class="md:w-1/2">
                    <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>

                    <p class="text-2xl text-green-700 font-semibold mb-5">
                        ${{ number_format($product->price, 2) }}
                    </p>

                    @if($product->description)
                        <p class="text-gray-700 leading-relaxed mb-6">
                            {{ $product->description }}
                        </p>
                    @endif

                    @if(!$product->is_available)
                        <p class="text-red-600 font-semibold mb-4">
                            Currently unavailable
                        </p>
                    @else
                        <form method="POST" action="{{ route('cart.add', $product->id) }}" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block mb-1 font-medium">Quantity</label>
                                <input type="number" name="quantity" value="1" min="1"
                                       class="border p-2 w-24 rounded-lg shadow-sm">
                            </div>

                            <button class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-medium transition">
                                Add to Cart
                            </button>
                        </form>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('shop.index') }}" class="text-blue-600 hover:underline">
                            ← Back to shop
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
