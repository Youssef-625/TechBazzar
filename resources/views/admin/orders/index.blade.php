<x-layout>
    <div class="container mx-auto px-4 py-6 mt-16">
        <h1 class="text-2xl font-bold mb-6">Manage Orders</h1>
        <table class="min-w-full bg-white border border-gray-200 mt-6">
            <thead>
            <tr class="bg-gray-300">
                <th class="border-b px-4 py-2 text-center">Order ID</th>
                <th class="border-b px-4 py-2 text-center">Customer Name</th>
                <th class="border-b px-4 py-2 text-center">Total Price</th>
                <th class="border-b px-4 py-2 text-center">Status</th>
                <th class="border-b px-4 py-2 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="border-b border-2 px-4 py-2 text-center font-bold">{{ $order->id }}</td>
                    <td class="border-b border-2 px-4 py-2 text-center font-bold">{{ $order->user->name }}</td>
                    <td class="border-b border-2 px-4 py-2 text-center text-green-500 font-bold">${{ $order->total_price }}</td>
                    <td class="border-b border-2 px-4 py-2 text-center font-bold">
                        <x-order-status :status="$order->status">{{$order->status}}</x-order-status>
                    </td>
                    <td class="border-b border-2 px-2 py-2 ">
                        <div class="flex justify-around">
                            <!-- View Icon with Hover Effect -->
                            <a href="{{ route('orders.show', $order->id) }}"
                               class="hover:scale-125 transform transition duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 576 512">
                                    <path fill="#0e58d8"
                                          d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                </svg>
                            </a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</x-layout>
