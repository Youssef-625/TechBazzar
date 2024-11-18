@vite(['resources/css/app.css','resources/js/app.js'])

<x-layout>
    <section class="py-8 bg-gray-100 mt-16">
        <div class="container mx-auto px-4  py-8">
            <div class="bg-white p-4 rounded-lg shadow-md flex  md:flex-row items-center">
                <!-- Product Image -->
                <div class="md:w-1/2 mb-4 md:mb-0 flex justify-center">
                    <img src="{{asset($product->imageUrl)}}" alt="Product Image"
                         class="w-full max-w-xs h-auto object-cover rounded-lg">
                </div>

                <!-- Product Information -->
                <div class="md:w-1/2 md:pl-6">
                    <h1 class="text-2xl font-bold mb-4">{{$product->name}}</h1>
                    <p class="text-gray-600 mb-4">{{$product->description}}</p>
                    <p class="text-green-600 font-bold text-xl mb-4">${{$product->price}}</p>
                    <!-- Action Buttons -->
                    <div class="flex gap-2 mt-10 -ml-2.5 items-center">
                        <form action="/cart/{{$product->id}}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded text-xs hover:bg-blue-900">
                                Add To Cart
                            </button>
                        </form>

                        @can('is_admin')
                            <a href="/admin/products/{{$product->id}}/edit"
                               class="bg-blue-600 text-white px-4 py-2 rounded text-xs hover:bg-blue-900 mb-3.5">
                                Edit
                            </a>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout>






