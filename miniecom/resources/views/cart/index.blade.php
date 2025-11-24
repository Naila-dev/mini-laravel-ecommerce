<x-app-layout>
    <div class="py-10 px-6 max-w-6xl mx-auto">

        <h1 class="text-4xl font-bold mb-8 tracking-tight">Your Cart</h1>

        @if (session('success'))
            <p class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm">
                {{ session('success') }}
            </p>
        @endif

        @if (empty($cart))
            <div class="bg-white p-10 rounded-xl shadow text-center">
                <p class="text-gray-600 text-lg">Your cart is currently empty.</p>
                <a href="{{ route('shop.index') }}"
                   class="text-blue-600 hover:underline block mt-4">
                    ← Continue shopping
                </a>
            </div>

        @else
            <div class="bg-white rounded-xl shadow overflow-x-auto p-6 mb-8">

                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="py-3 px-4">Product</th>
                            <th class="py-3 px-4 text-right">Price</th>
                            <th class="py-3 px-4 text-center">Qty</th>
                            <th class="py-3 px-4 text-right">Subtotal</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cart as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-3">
                                        @if($item['image'])
                                            <img src="{{ asset('storage/' . $item['image']) }}"
                                                 class="w-14 h-14 object-cover rounded shadow">
                                        @endif
                                        <span class="font-medium">{{ $item['name'] }}</span>
                                    </div>
                                </td>

                                <td class="py-4 px-4 text-right">
                                    ${{ number_format($item['price'], 2) }}
                                </td>

                                <td class="py-4 px-4 text-center">
                                    {{ $item['quantity'] }}
                                </td>

                                <td class="py-4 px-4 text-right font-semibold">
                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                </td>

                                <td class="py-4 px-4 text-center">
                                    <form method="POST" action="{{ route('cart.remove', $item['id']) }}">
                                        @csrf
                                        <button class="text-red-600 hover:underline font-medium">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <div class="flex justify-between items-center mb-8">

                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf
                    <button class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium"
                            onclick="return confirm('Clear cart?');">
                        Clear Cart
                    </button>
                </form>

                <div class="text-right">
                    <p class="text-2xl font-bold">
                        Total: ${{ number_format($total, 2) }}
                    </p>
                </div>

            </div>

            <a href="{{ route('shop.index') }}"
               class="text-blue-600 hover:underline">
                ← Continue shopping
            </a>

            <a href="{{ route('checkout.index') }}" class="btn btn-success">
    Proceed to Checkout
</a>


        @endif

    </div>
</x-app-layout>
