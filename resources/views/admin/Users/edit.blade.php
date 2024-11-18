<x-layout>
    <div class="container mx-auto px-4 py-6 mt-16" style="width: 800px">
        <h1 class="text-2xl font-bold mb-6">User : {{$user->name}}</h1>
        <h1 class="text-2xl font-bold mb-6">Edit</h1>
        <form action="/admin/users/{{$user->id}}"  method="POST"
              class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="">
                    <label for="name" class="block text-gray-700 font-medium mb-2">User Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">User Email</label>
                    <input type="text" id="email" name="email" value="{{$user->email}}"
                           class="w-full px-4 py-2 border-2  rounded-md  focus:outline-none focus:border-3 focus:border-blue-800  @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone_number" class="block text-gray-700 font-medium mb-2">User Phone</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{$user->phone_number}}"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('phone_number') border-red-500 @enderror">
                    @error('phone_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="address" class="block text-gray-700 font-medium mb-2">User Address</label>
                    <input type="text" id="address" name="address" value="{{$user->address}}"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('address') border-red-500 @enderror">
                    @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-2">change User Password</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800  @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Conformation Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:border-3 focus:border-blue-800">
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
