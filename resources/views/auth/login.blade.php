<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center">Log In</h2>
        <form action="/login" method="POST">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="w-full px-3 py-1.5 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('email')
                <x-error :error="$errors->first('email')"/>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="w-full px-3 py-1.5 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('password')
                <x-error :error="$errors->first('password')"/>
                @enderror
            </div>

            <!-- Log In Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-1.5 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Log In</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
