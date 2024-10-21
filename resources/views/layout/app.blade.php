<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kev Poster')</title>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Alertas --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-white text-black">
    <!-- Navbar -->
    <nav class="bg-black text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-lg font-bold">Kev Posters</a>
            <div>
                <a href="#" class="mx-4 text-white hover:text-gray-300">Posters</a>
                <a href="{{ route('posters.create') }}" class="text-white hover:text-gray-300">Crear poster</a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container mx-auto p-4">
        @yield('content')
    </div>

    @yield('alert')
</body>
</html>
