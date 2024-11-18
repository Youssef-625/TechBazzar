@props(['product'])
<div class="min-w-[200px] bg-white p-6 rounded-lg shadow-lg text-center relative overflow-hidden">
    <img src="{{asset($product->imageUrl)}}" alt="Phone Model" class="mb-4 h-40 object-cover mx-auto">
    <h3 class="text-lg font-bold mb-2">{{$product->name}}</h3>
    <p class="text-gray-600 mb-8 font-bold">${{$product->price}}</p>
    <form action="/cart/{{$product->id}}" method="POST" class="inline">
        <div class="flex-col flex gap-3 justify-center">
            <x-button href="products/{{$product->id}}">View Details</x-button>
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-xs hover:bg-blue-900">Add To Cart</button>
        </div>
    </form>
</div>
