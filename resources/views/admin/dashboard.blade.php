<x-layout>
    <section class="min-h-screen bg-gray-100 py-10 mt-24">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Sidebar -->
                <aside class="bg-white p-6 rounded-lg shadow-lg self-start">
                    <h2 class="text-xl font-semibold mb-6">Admin Dashboard</h2>
                    <nav class="space-y-4">
                        <a href="/admin/products"
                           class="block bg-blue-500 text-white text-center py-2 rounded-lg hover:bg-blue-600">Manage
                            Products</a>
                        <a href="/admin/orders"
                           class="block bg-green-500 text-white text-center py-2 rounded-lg hover:bg-green-600">Manage
                            Orders</a>
                        <a href="/admin/users"
                           class="block bg-yellow-500 text-white text-center py-2 rounded-lg hover:bg-yellow-600">Manage
                            Users</a>
                    </nav>
                </aside>

                <!-- Main Content -->
                <div class="md:col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-6">Welcome, {{ auth()->user()->name }}</h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Stats Card -->
                            <div class="bg-blue-100 p-4 rounded-lg text-center">
                                <p class="text-3xl font-semibold">{{ $totalProducts }}</p>
                                <p class="text-lg text-blue-600">Total Products</p>
                            </div>

                            <div class="bg-green-100 p-4 rounded-lg text-center">
                                <p class="text-3xl font-semibold">{{ $totalOrders }}</p>
                                <p class="text-lg text-green-600">Total Orders</p>
                            </div>

                            <div class="bg-yellow-100 p-4 rounded-lg text-center">
                                <p class="text-3xl font-semibold">{{ $totalUsers }}</p>
                                <p class="text-lg text-yellow-600">Total Users</p>
                            </div>
                        </div>

                        <!-- Table Example -->
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                                <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">Order ID</th>
                                    <th class="py-2 px-4 border-b">Customer</th>
                                    <th class="py-2 px-4 border-b">Amount</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="py-2 px-4 border-b text-center">#{{ $order->id }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $order->user->name }}</td>
                                        <td class="py-2 px-4 border-b text-center">{{ $order->total_price }}</td>
                                        <td class="py-2 px-4 border-b text-green-600 text-center">
                                            <x-order-status :status="$order->status">{{ $order->status }}</x-order-status>
                                        </td>
                                        <td class="py-2 px-4 border-b text-center">{{ $order->created_at->format('H:i d, M Y') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
