<x-layout>
<div class="mt-32">
    <x-product-panel :$heading class="">
        @foreach($products as $product)
            <x-product-card :$product/>
        @endforeach
    </x-product-panel>

    <div class="mx-8 mb-10">
        {{($products->links())}}
    </div>
</div>

</x-layout>
