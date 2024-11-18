<x-layout>
    <div class="container mx-auto px-4 py-6 mt-16">
        <h1 class="text-3xl font-extrabold mb-6 text-gray-800">Your Shopping Cart</h1>
        @if(session('success'))
            <div id="flash-message" class="text-center bg-green-500 text-white px-4 py-2 rounded-md mb-4 mt-4 w-72 mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200 mt-8 shadow-md rounded-lg overflow-hidden">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Image</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600">Product</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Quantity</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Price</th>
                <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600">Delete</th>
            </tr>
            </thead>
            <tbody>
            @php
            $subTotal=0;
            @endphp
            @foreach($carts as $cart)
                @php
                $subTotal+=$cart->product->price*$cart->quantity;
                @endphp
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <img src="{{ asset($cart->product->imageUrl) }}" alt="{{ $cart->product->name }}" class="w-24 h-32 object-cover rounded-md shadow-md">
                    </td>
                    <td class="px-6 py-4 text-left font-bold text-gray-800">
                        {{ $cart->product->name }}
                    </td>
                    <td class="px-6 py-4 text-center font-medium text-gray-700">
                        {{ $cart->quantity }}
                    </td>
                    <td class="px-6 py-4 text-center font-semibold text-green-600">
                        ${{ $cart->product->price * $cart->quantity }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form action="/cart/{{$cart->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Subtotal Section -->
        <div class="bg-gray-50 rounded-xl p-6 w-full mb-8 max-w-md mx-auto shadow-lg mt-8">
            <div class="flex items-center justify-between mb-6">
                <p class="text-xl text-gray-600">Subtotal</p>
                <h6 class="font-semibold text-xl text-gray-900">${{ $subTotal }}</h6>
            </div>
            <div class="flex items-center justify-between pb-6 border-b border-gray-200">
                <p class="text-xl text-gray-600">Delivery Charge</p>
                <h6 class="font-semibold text-xl text-gray-900">$45.00</h6>
            </div>
            <div class="flex items-center justify-between pt-6">
                <p class="text-2xl font-medium text-gray-900">Total</p>
                <h6 class="font-medium text-2xl text-indigo-500">${{ $subTotal + 45 }}</h6>
            </div>
        </div>

        <!-- Continue to Payment Button -->
        <div class="flex justify-center mt-8">
            <button class="rounded-full w-full max-w-md py-4 text-white bg-indigo-600 font-semibold text-lg transition duration-300 ease-in-out hover:bg-indigo-700 shadow-md flex items-center justify-center">
                Continue to Payment
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</x-layout>

<script>
    setTimeout(function () {
        document.getElementById('flash-message').style.display = 'none';
    }, 5000); // Hide flash message after 5 seconds
</script>
