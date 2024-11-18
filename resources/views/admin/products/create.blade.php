<x-layout>
    <div class="container mx-auto px-4 py-6 mt-16" style="width: 800px">
        <h1 class="text-2xl font-bold mb-6">Add New Product</h1>

        <form action="/admin/products" method="POST" enctype="multipart/form-data"
              class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
                    <input type="text" id="price" name="price" value="${{old('price')}}"
                           class="w-full px-4 py-2 border-2  rounded-md  focus:outline-none focus:border-3 focus:border-blue-800  @error('price') border-red-500 @enderror">
                    @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stock" class="block text-gray-700 font-medium mb-2">Stocks</label>
                    <input type="number" id="stock" name="stock" value="{{ old('price') }}"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('stock') border-red-500 @enderror">
                    @error('stock')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
                    <select id="category_id" name="category_id"
                            class="w-full px-4 py-2 border-2  rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('category_id') border-red-500 @enderror">
                        <option value="">Select type</option>
                        <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Laptop</option>
                        <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Phone</option>
                        <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>PC</option>
                    </select>
                    @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                    <select id="status" name="status"
                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('status') border-red-500 @enderror">
                        <option value="">Select status</option>
                        <option value="featured" {{ old('status') == 'featured' ? 'selected' : '' }}>Featured</option>
                        <option value="onSale" {{ old('status') == 'onSale' ? 'selected' : '' }}>On Sale</option>
                        <option value="regular" {{ old('status') == 'regular' ? 'selected' : '' }}>Regular</option>
                    </select>
                    @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="type" class="block text-gray-700 font-medium mb-2">Brand Name</label>
                    <input type="text" id="type" name="type" value="{{ old('type') }}"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('type') border-red-500 @enderror">
                    @error('type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="imageUrl" class="block text-gray-700 font-medium mb-2">Product Image</label>
                    <img id="image-preview" src="" style="width: 200px" class="mb-4">
                    <div class="relative">
                        <input type="file" id="imageUrl" name="imageUrl" class="absolute inset-0 opacity-0 cursor-pointer">
                        <label for="imageUrl"
                               style="width: 200px; "
                               class="block  px-4 py-2 border rounded-md bg-blue-500 text-white text-center cursor-pointer hover:bg-blue-600">
                            Choose File
                        </label>
                        @error('imageUrl')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save
                    Product
                </button>
            </div>
        </form>
    </div>
</x-layout>
<script>
    document.getElementById('imageUrl').addEventListener('change', function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('image-preview').src = e.target.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
