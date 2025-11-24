<x-app-layout>

    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot> -->

<div class="max-w-7xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-6 text-gray-800">Shop</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($products as $product)
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">

                <!-- Product Image -->
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="h-60 w-full object-cover">

                <div class="p-5 space-y-3">

                    <!-- Name -->
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $product->name }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm">
                        {{ Str::limit($product->description, 80) }}
                    </p>

                    <!-- Price -->
                    <div class="text-xl font-bold text-indigo-600">
                        ${{ number_format($product->price, 2) }}
                    </div>

                    <!-- Add to cart -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button
                            class="w-full bg-indigo-600 text-white py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                            Add to Cart
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>

</div>
</x-app-layout>