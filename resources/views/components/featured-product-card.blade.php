@props(['product'])

<div class="bg-white p-7 rounded-lg shadow-md text-center h-72 flex flex-col justify-between ">
    <img src="{{asset($product->imageUrl)}}" alt="Laptop"
         class="mx-auto h-48 object-cover -mt-32 ">
    <h3 class="text-lg font-bold ">{{$product->name}}</h3>
    <p class="text-gray-600  font-bold">${{$product->price}}</p>
    <form action="/cart/{{$product->id}}" method="POST">
        <div class="flex flex-col mt-4 mx-auto gap-2 w-2/3">
            <x-button href="products/{{$product->id}}">View Details</x-button>
            @csrf
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded text-xs hover:bg-blue-900">Add to
                Cart
            </button>
        </div>
    </form>
</div>
