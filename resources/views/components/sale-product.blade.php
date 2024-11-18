@props(['product'])
<div class="min-w-[200px] bg-white p-6 rounded-lg shadow-lg text-center relative overflow-hidden">
    <!-- Sale Badge -->
    <span
        class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">Sale</span>
    <img src="{{asset($product->imageUrl)}}" alt="Laptop"
         class="mx-auto -mt-5 h-40 object-cover">
    <h3 class="text-lg font-bold mb-2">{{$product->name}}</h3>
    <p class="text-red-600 font-bold mb-8">${{$product->price}}</p>
    <form action="/cart/{{$product->id}}" method="POST" class="inline">
        <div class="flex-col flex  gap-3 justify-center">
            <x-button class="bg-red-600 hover:bg-red-900" href="products/{{$product->id}}">View Details</x-button>
            @csrf
            <button type="submit" class="text-white px-4 py-2 rounded text-xs bg-red-600 hover:bg-red-900">Add To Cart
            </button>
        </div>
    </form>

</div>

{{--<div class="min-w-[200px] bg-white p-6 rounded-lg shadow-lg text-center flex-shrink-0">--}}
{{--    <img src="{{asset($product->imageUrl)}}" alt="Phone Model" class="mb-4 h-40 object-cover mx-auto">--}}
{{--    <h3 class="text-lg font-bold mb-2">{{$product->name}}</h3>--}}
{{--    <p class="text-gray-600 mb-8 font-bold">${{$product->price}}</p>--}}
{{--    <div class="flex-col flex gap-3 justify-center">--}}
{{--        <x-button href="products/{{$product->id}}">View Details</x-button>--}}
{{--        <x-button>Add To Cart</x-button>--}}
{{--    </div>--}}
{{--</div>--}}
