@props(['type'=>null,'heading','class'=>null])
@if($type=='carousel')
    <div class="relative w-full h-96" >
        <img src="{{asset('/images/hi-tech-digital-circuit-board-futuristic-ai-pad-and-electrical-lines-connected-on-blue-lighting-background-vector.jpg')}}"
             class="object-cover w-full h-full"
             alt="xd">
        <!-- Carousel Items -->
        {{$slot}}
        <!-- Navigation Arrows -->
        <button class="absolute left-4 top-1/2  opacity-25  hover:opacity-100 transform  -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full"
                id="prevBtn">&#10094
        </button>
        <button class="absolute right-4 top-1/2 opacity-25  hover:opacity-100  transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full"
                id="nextBtn">&#10095
        </button>
    </div>
@elseif($type=='featured')
        <!-- Section Heading -->
        <section class="container mx-auto py-10 mt-16 ">
            <h2 class="text-2xl font-bold text-center mb-32">{{$heading}}</h2>
            <div class="grid grid-cols-5 gap-6 w-full">
                {{$slot}}
            </div>
        </section>

@elseif($type=='onSale')
        <div class="relative">
            <h2 class="text-2xl font-bold text-center mb-7">{{$heading}}</h2>
            <!-- Left Scroll Button -->
            <button class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-800 opacity-40 hover:opacity-100 text-white px-3 py-1 rounded-full"
                    onclick="scrollContainer('{{$class}}','left')">
                &#10094; <!-- Left arrow -->
            </button>

            <!-- Right Scroll Button -->
            <button class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-800 opacity-40 hover:opacity-100 text-white px-3 py-1 rounded-full"
                    onclick="scrollContainer('{{$class}}','right')">
                &#10095; <!-- Right arrow -->
            </button>

            <!-- Scrollable Container -->
            <div class="flex overflow-x-auto space-x-3.5 scrollbar-hide {{$class}} px-8">
                {{$slot}}
            </div>
        </div>
@else
    <div class="relative">
        <h2 class="text-2xl font-bold text-center mb-7">{{$heading}}</h2>
        <!-- Left Scroll Button -->
        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-800 opacity-40 hover:opacity-100 text-white px-3 py-1 rounded-full"
                onclick="scrollContainer('{{$class}}','left')">
            &#10094; <!-- Left arrow -->
        </button>

        <!-- Right Scroll Button -->
        <button class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-gray-800 opacity-40 hover:opacity-100 text-white px-3 py-1 rounded-full"
                onclick="scrollContainer('{{$class}}','right')">
            &#10095; <!-- Right arrow -->
        </button>

        <!-- Scrollable Container -->
        <div class="flex overflow-x-auto space-x-3.5 scrollbar-hide {{$class}} px-8">
            {{$slot}}
        </div>
    </div>
@endif


