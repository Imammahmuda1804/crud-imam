<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Library')</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts: Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    {{-- Memanggil file CSS terpusat Anda --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Section untuk style tambahan per halaman (jika diperlukan) --}}
    @yield('styles')
</head>
<body class="text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar Modern -->
    <header class="sticky top-0 z-40">
        <nav class="bg-white/80 backdrop-blur-lg shadow-sm">
            <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <a href="{{ route('books.index') }}" class="flex items-center gap-2">
                    <i class="fas fa-book-open-reader text-2xl text-indigo-600"></i>
                    <span class="font-bold text-xl text-gray-800">MyLibrary</span>
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    {{-- Menambahkan kelas 'active' berdasarkan route --}}
                    <a href="{{ route('books.index') }}" class="{{ Route::is('books.*') ? 'text-indigo-600 font-bold' : 'text-gray-500' }} hover:text-indigo-600 transition-colors duration-300">Books</a>
                    <a href="{{ route('authors.index') }}" class="{{ Route::is('authors.*') ? 'text-indigo-600 font-bold' : 'text-gray-500' }} hover:text-indigo-600 transition-colors duration-300">Authors</a>
                    <a href="{{ route('categories.index') }}" class="{{ Route::is('categories.*') ? 'text-indigo-600 font-bold' : 'text-gray-500' }} hover:text-indigo-600 transition-colors duration-300">Categories</a>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-600 hover:text-indigo-600 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Modern -->
    <footer class="bg-white mt-12">
        <div class="container mx-auto px-6 py-4 text-center text-gray-500">
            &copy; {{ date('Y') }} MyLibrary. Crafted with <i class="fas fa-heart text-red-500"></i> in Indonesia by Imam mahmuda.
        </div>
    </footer>

</body>
</html>
