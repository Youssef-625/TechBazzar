<x-layout>
    <div class="container mx-auto px-4 py-6 mt-16">
        <h1 class="text-3xl font-bold mb-6 ">Order Details</h1>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Order Summary -->
            <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-6">Order Information</h2>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div><strong>Name :</strong> {{ $order->user->name }}</div>
                    <div><strong>Email :</strong> {{ $order->user->email }}</div>
                    <div><strong>Shipped Address :</strong> {{ $order->user->address }}</div>
                    <div>
                        <strong>Order Status :</strong>
                        <span
                            class="px-3 py-1 rounded-full {{ $order->status == 'completed' ? 'bg-green-200 text-green-700' : 'bg-yellow-200 text-yellow-700' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                    <div><strong>Total Price :</strong> ${{ $order->total_price }}</div>
                </div>

                <!-- Products in the Order -->
                <h2 class="text-2xl font-bold mb-4 ">Products Ordered</h2>
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600">
                        <th class="border-b px-4 py-2 text-center">Product</th>
                        <th class="border-b px-4 py-2 text-center">Product Name</th>
                        <th class="border-b px-4 py-2 text-center">Quantity</th>
                        <th class="border-b px-4 py-2 text-center">Price at Purchase</th>
                        <th class="border-b px-4 py-2 text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $orderProduct)
                        <tr>
                            <td class="border-b px-4 py-2 text-center">
                                <img src="{{asset($orderProduct->imageUrl)}}" style="width: 70px;"
                                     alt="{{$orderProduct->imageUrl}}">
                            </td>
                            <td class="border-b px-4 py-2 text-center">{{ $orderProduct->name }}</td>
                            <td class="border-b px-4 py-2 text-center">{{ $orderProduct->pivot->quantity }}</td>
                            <td class="border-b px-4 py-2 text-center">
                                ${{ $orderProduct->pivot->price_at_purchase }}</td>
                            <td class="border-b px-4 py-2 text-center">
                                ${{ $orderProduct->pivot->price_at_purchase * $orderProduct->pivot->quantity }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Order Actions -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4 ">Actions</h2>
                <div class="flex flex-col gap-3">
                    <!-- Order Status Update Form -->
                    <form action="/admin/orders/{{$order->id}}" method="POST" class="mt-6">
                        @csrf
                        @method('PATCH')

                        <label for="status" class="block text-sm font-medium">Update Status:</label>
                        <select name="status" id="status"
                                class="form-select py-1 mt-1 block w-full border-2 border-r-2 rounded-md focus:border-blue-600">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled
                            </option>
                        </select>
                        @error('status')
                        <p class="text-red-700">{{$message}}</p>
                        @enderror

                        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">
                            Update Status
                        </button>
                    </form>
                    <form action="/admin/orders/{{$order->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">Delete Order</button>
                    </form>
                    <a href="{{ route('orders.index') }}" class="text-blue-700 hover:underline">Back to Orders</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
