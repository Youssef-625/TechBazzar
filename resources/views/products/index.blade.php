<x-layout>
    <!-- Hero Section -->

        <section class="relative overflow-hidden mt-16" >
            <x-product-panel type="carousel">
                @foreach($featuredProducts as $product)
                    <x-carousel-item :$product/>
                @endforeach
            </x-product-panel>
        </section>
    <!-- Featured Products Section -->
    <section class="-mt-10 relative">
        <x-product-panel type="featured" heading="Featured Products" class="featured">
            @foreach($featuredProducts as $product)
                <x-featured-product-card :$product/>
            @endforeach
        </x-product-panel>
    </section>

    <!-- sales section -->
    <section class="py-10">
        <x-product-panel type="onSale" heading="onSale Products" class="sale">
            @foreach($onSaleProducts as $product)
                <x-sale-product :$product/>
            @endforeach
        </x-product-panel>
    </section>

    <!-- Laptops Section -->
    <section class="py-10">
        <x-product-panel heading="Laptops" class="laptop">
            @foreach($laptops as $product)
                <x-product-card :$product/>
            @endforeach
        </x-product-panel>
    </section>

    <section class="py-10">
        <x-product-panel heading="PCs" class="pc">
            @foreach($pcs as $product)
                <x-product-card :$product/>
            @endforeach
        </x-product-panel>
    </section>

    <section class="py-10">
        <x-product-panel heading="Phones" class="phone">
            @foreach($phones as $product)
                <x-product-card :$product/>
            @endforeach
        </x-product-panel>
    </section>
    <!-- BestSeller -->
    <section class="py-10">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-center mb-6">BestSellers TO DO</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            </div>
        </div>
    </section>
</x-layout>
<script>
    function scrollContainer(containerClass, direction) {
        const container = document.querySelector(`.${containerClass}`);
        if (container) {
            if (direction === 'right')
                container.scrollBy({left: 250, behavior: 'smooth'});
            else
                container.scrollBy({left: -250, behavior: 'smooth'});
        }
    }
</script>

