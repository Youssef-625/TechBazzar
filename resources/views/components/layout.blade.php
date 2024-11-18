<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechBazaar - Home</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col min-h-screen ">
<!-- Header -->
<header class="bg-white shadow fixed w-full z-10">
    <div class="container mx-auto flex justify-between items-center py-4">
        <div class="text-2xl font-bold text-blue-800">TechBazaar</div>

        <nav class="space-x-6">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="/laptops">Laptops</x-nav-link>
            <x-nav-link href="/pcs">PCs</x-nav-link>
            <x-nav-link href="/phones">Phones</x-nav-link>
            @can('is_admin')
                <x-nav-link href="/admin">Dashboard</x-nav-link>
            @endcan
        </nav>
        @auth()
        <a href="/cart/{{auth()->id()}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-6 h-6"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
        </a>
        @endauth
    @guest
            <div>
                <x-button  href="/login" class="rounded-md">Log In</x-button>
                <x-button class="rounded-md" href="/register">Register</x-button>
            </div>
        @endguest
        @auth
            <div class="flex gap-6 ">
                <p class="text-blue-800 font-bold ">Welcome {{Auth::user()->name}} !</p>
                <form action="/logout" method="post" name="logout" id="logout">
                    @method('DELETE')
                    @csrf
                        <button class="rounded-md  font-bold text-red-500 hover:text-red-600 hover:font-black">Log Out</button>
                </form>
            </div>
        @endauth

    </div>
</header>

{{$slot}}

</body>
</html>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6 text- p-4 sticky top-[100vh]">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 TechBazaar. All Rights Reserved.</p>
        <div class="mt-4 space-x-6">
            <a href="#" class="hover:text-blue-500">Privacy Policy</a>
            <a href="#" class="hover:text-blue-500">Terms of Service</a>
        </div>
    </div>
</footer>
