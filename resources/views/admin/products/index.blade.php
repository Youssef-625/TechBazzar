<x-layout>
    <div class="container mx-auto px-4 py-6 mt-16">

        <h1 class=" text-2xl  font-bold mb-6">Product List</h1>
        <x-button href="/admin/products/create" class="rounded-md">Add New Product</x-button>

        @if(session('success'))
            <div id='flash-message' class=" text-center bg-green-500 text-white px-4 py-2 rounded-md mb-4 mt-4"
                 style="width: 250px">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200 mt-6">
            <thead>
            <tr class="bg-gray-300">
                <th class="border border-gray-300 px-4 py-2 text-center text-lg">Image</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-lg">Name</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-lg">Price</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-lg">Status</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-lg">Stocks</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-lg">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center flex justify-center">
                        <img src="{{ asset($product->imageUrl) }}" alt="{{ $product->name }}" style="width: 100px"
                             class="w-24 h-auto object-cover">
                    </td>
                    <td class="border border-gray-300 px-4 py-2 text-center  font-bold ">{{ $product->name }}</td>

                    <td class="border border-gray-300 px-4 py-2 text-center text-green-600 font-bold">${{ $product->price }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold ">{{ $product->status ?? 'regular' }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center font-bold ">{{ $product->stock }}</td>
                    <td class="border border-gray-300 px-0 py-2 text-center font-bold ">
                        <div class="flex justify-around">
                            <a href="/products/{{$product->id}}" class="hover:scale-125 transform transition duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 576 512">
                                    <path fill="#0e58d8"
                                          d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                </svg>
                            </a>
                            <a href="/admin/products/{{$product->id}}/edit">
                                <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="#0076d1"
                                          d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
                                </svg>
                            </a>
                            <form action="/admin/products/{{$product->id}}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-5">
                                    <svg style="width: 17px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="#f00000"
                                              d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
</x-layout>
<script>
    setTimeout(function () {
        document.getElementById('flash-message').style.display = 'none';
    }, 5000); // 5 seconds
</script>
