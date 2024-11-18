@props(['product' => null, 'quantity'])

<div class="grid grid-cols-1 lg:grid-cols-2 min-[550px]:gap-6 border-t border-gray-200 py-6">
    <!-- Left Column -->
    <div class="flex items-center flex-col min-[550px]:flex-row gap-3 min-[550px]:gap-6 w-full max-xl:justify-center max-xl:max-w-xl max-xl:mx-auto">
        <div class="img-box">
            <img src="{{ asset($product->imageUrl) }}" alt="perfume bottle image" class="xl:w-[140px] rounded-xl object-cover">
        </div>
        <div class="pro-data w-full max-w-sm text-center">
            <h5 class="font-bold text-xl leading-8 text-blue-600">{{$product->name}}</h5>
            <p class="font-normal text-lg leading-8 text-gray-500 my-2 min-[550px]:my-3">{{$product->type}}</p>
        </div>
    </div>

    <!-- Right Column -->
    <div class="flex items-center justify-between w-full max-xl:max-w-xl max-xl:mx-auto gap-2 text-center">
        <div class="flex items-center w-full mx-auto justify-center gap-2">
            <button class="group rounded-l-full px-6 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-300 hover:bg-gray-50">
                <!-- Minus Icon -->
                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </button>
            <input type="text" class="border-y border-gray-200 outline-none text-gray-900 font-semibold text-lg w-full max-w-[118px] min-w-[80px] placeholder:text-gray-900 py-[15px] text-center bg-transparent" value="{{$quantity}}">
            <button class="group rounded-r-full px-6 py-[18px] border border-gray-200 flex items-center justify-center shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:border-gray-300 hover:bg-gray-50">
                <!-- Plus Icon -->
                <svg class="stroke-gray-900 transition-all duration-500 group-hover:stroke-black" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M11 5.5V16.5M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center w-full">
            <h6 class="text-green-600 font-manrope font-bold text-2xl leading-9">
                ${{$product->price}}
            </h6>
            <div class="flex justify-center">
                <svg style="width: 17px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#f00000" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
