@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4">

        <h2 class="text-3xl font-bold mb-8 text-gray-800">Checkout</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- LEFT SIDE — SHIPPING FORM --}}
            <div class="bg-white shadow rounded-xl p-6">
                <h3 class="text-xl font-semibold mb-4 text-gray-700">Shipping Details</h3>

                <form id="checkoutForm" action="{{ route('checkout.placeOrder') }}" method="POST">
                    @csrf

                    {{-- Name --}}
                    <label class="block mb-3">
                        <span class="text-gray-600">Full Name</span>
                        <input type="text" name="shipping_name" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </label>

                    {{-- Phone --}}
                    <label class="block mb-3">
                        <span class="text-gray-600">Phone Number</span>
                        <input type="text" name="shipping_phone" required
                               class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    </label>

                    {{-- Address --}}
                    <label class="block mb-3">
                        <span class="text-gray-600">Shipping Address</span>
                        <textarea name="shipping_address" rows="3" required
                                  class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                    </label>

                    {{-- Payment Options --}}
                    <h3 class="text-xl font-semibold mt-6 mb-3 text-gray-700">Payment Method</h3>

                    <div class="space-y-3">

                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment_method" value="mpesa" required>
                            <span>M-Pesa</span>
                        </label>

                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment_method" value="cod">
                            <span>Cash on Delivery</span>
                        </label>

                        <label class="flex items-center space-x-3">
                            <input type="radio" name="payment_method" value="card">
                            <span>Credit/Debit Card</span>
                        </label>

                    </div>

                    <button type="submit"
                        class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-semibold text-lg transition duration-200">
                        Place Order
                    </button>

                </form>
            </div>

            {{-- RIGHT SIDE — ORDER SUMMARY --}}
            <div class="bg-white shadow rounded-xl p-6">

                <h3 class="text-xl font-semibold mb-4 text-gray-700">Order Summary</h3>

                <ul class="divide-y divide-gray-200">
                    @foreach ($cart as $item)
                        <li class="flex justify-between py-3">
                            <div>
                                <p class="text-gray-800 font-medium">{{ $item['name'] }}</p>
                                <p class="text-gray-500 text-sm">Qty: {{ $item['quantity'] }}</p>
                            </div>

                            <span class="text-gray-900 font-semibold">
                                ${{ number_format($item['price'], 2) }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4 flex justify-between items-center border-t pt-4">
                    <h3 class="text-xl font-bold text-gray-800">Total</h3>
                    <p class="text-2xl font-bold text-indigo-600">
                        ${{ number_format($total, 2) }}
                    </p>
                </div>

            </div>
        </div>

    </div>
@endsection
