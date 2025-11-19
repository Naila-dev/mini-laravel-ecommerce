<x-app-layout>
    <div class="p-6 max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

        @if (session('success'))
            <p class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </p>
        @endif

        @if (empty($cart))
            <p>Your cart is currently empty.</p>
            <a href="{{ route('shop.index') }}" class="text-blue-600 mt-4 inline-block">
                &larr; Continue shopping
            </a>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border-collapse mb-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border text-left">Product</th>
                            <th class="px-4 py-2 border text-right">Price</th>
                            <th class="px-4 py-2 border text-center">Quantity</th>
                            <th class="px-4 py-2 border text-right">Subtotal</th>
                            <th class="px-4 py-2 border text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td class="border px-4 py-2">
                                    <div class="flex items-center space-x-3">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}"
                                                 class="w-12 h-12 object-cover rounded">
                                        @endif
                                        <span>{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    ${{ number_format($item['price'], 2) }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    {{ $item['quantity'] }}
                                </td>
                                <td class="border px-4 py-2 text-right">
                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                </td>
                                <td class="border px-4 py-2 text-center">
                                    <form method="POST"
                                          action="{{ route('cart.remove', $item['id']) }}"
                                          onsubmit="return confirm('Remove this item?');">
                                        @csrf
                                        <button class="text-red-600">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-between items-center">
                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf
                    <button class="px-4 py-2 bg-gray-300 rounded"
                            onclick="return confirm('Clear cart?');">
                        Clear Cart
                    </button>
                </form>

                <div class="text-right">
                    <p class="text-xl font-bold">
                        Total: ${{ number_format($total, 2) }}
                    </p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('shop.index') }}" class="text-blue-600">&larr; Continue shopping</a>
            </div>
        @endif
    </div>
</x-app-layout>
