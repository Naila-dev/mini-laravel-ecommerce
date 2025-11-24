<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 border">Order ID</th>
                                <th class="px-4 py-2 border">Customer</th>
                                <th class="px-4 py-2 border">Total</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Date</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($orders as $order)
                                <tr>
                                    <td class="border px-4 py-2">{{ $order->id }}</td>
                                    <td class="border px-4 py-2">{{ $order->user->name }}</td>
                                    <td class="border px-4 py-2">${{ number_format($order->total, 2) }}</td>
                                    <td class="border px-4 py-2">{{ $order->status }}</td>
                                    <td class="border px-4 py-2">{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="#" class="text-blue-600">View</a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
