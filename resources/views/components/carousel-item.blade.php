@props(['product'])

<div class="carousel-item absolute flex justify-around mx-10 inset-0 transition-opacity duration-1000 ease-in-out">
    <div style="width: 33%" class="text-red-50 font-bold flex justify-center items-center text-center ">
        <p class="text-xl  mb-6">{{$product->description}}</p>
    </div>
    <div style="width: 33%;" class="flex flex-col  justify-center items-center text-center ">
        <h1 class="text-4xl text-red-50 font-bold mb-4">{{$product->name}}</h1>
        <h1 class="text-2xl text-red-50 font-bold mb-4">${{$product->price}}</h1>
{{--        <form action="/cart/{{$product->id}}" method="POST" class="inline">--}}
{{--            @csrf--}}
{{--            <button type="submit" class="bg-white text-gray-800 px-6 py-2 rounded-full font-semibold">Shop Now</button>--}}
{{--        </form>--}}
    </div>
    <div style="width: 33%">
        <img
            src="{{asset($product->imageUrl)}}"
            alt="Product 1" class="object-cover  h-full">
    </div>
</div>

