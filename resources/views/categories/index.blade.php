@extends('layouts.app')

@section('title', 'Book Categories')

@section('styles')
@endsection

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10 gap-4">
        <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Browse by Category</h1>
        <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-plus-circle"></i>
            <span>Add New Category</span>
        </a>
    </div>

    {{-- Daftar Kategori --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            // Array warna untuk border kartu
            $colors = ['#4f46e5', '#db2777', '#16a34a', '#d97706', '#0891b2', '#6d28d9'];
        @endphp
        @forelse($categories as $index => $category)
            <div class="category-card bg-white rounded-lg shadow-md flex flex-col" style="border-color: {{ $colors[$index % count($colors)] }};">
                <div class="p-6 flex-grow">
                    <div class="flex justify-between items-start">
                        <div class="flex-grow pr-4">
                            <h2 class="text-2xl font-bold text-gray-900">{{ $category->name }}</h2>
                            <p id="desc-{{ $category->id }}" class="category-description text-gray-500 text-sm mt-2 line-clamp-3">{{ $category->description ?: 'No description available.' }}</p>
                            {{-- Tombol Read More hanya muncul jika deskripsi panjang --}}
                            @if(strlen($category->description) > 150)
                                <button onclick="toggleDesc({{ $category->id }})" class="text-xs text-indigo-600 hover:underline mt-2 font-semibold">Read More</button>
                            @endif
                        </div>
                        <div class="flex-shrink-0 ml-4 text-center">
                            <p class="text-4xl font-bold text-gray-800">{{ $category->books ? $category->books->count() : 0 }}</p>
                            <p class="text-xs text-gray-400">Books</p>
                        </div>
                    </div>
                </div>

                {{-- Aksi --}}
                <div class="bg-gray-50 p-4 mt-auto flex justify-end items-center">
                    <div class="flex gap-3">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-gray-400 hover:text-blue-500 transition-colors" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure? This will also delete associated books.')" class="text-gray-400 hover:text-red-500 transition-colors" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-2xl shadow-sm">
                <i class="fas fa-tags text-6xl text-gray-300"></i>
                <p class="mt-6 text-2xl font-semibold text-gray-600">No Categories Found.</p>
                <p class="text-gray-400 mt-2">Click "Add New Category" to create your first one.</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    function toggleDesc(categoryId) {
        const descElement = document.getElementById(`desc-${categoryId}`);
        const button = event.target;

        if (descElement.classList.contains('line-clamp-3')) {
            descElement.classList.remove('line-clamp-3');
            button.textContent = 'Read Less';
        } else {
            descElement.classList.add('line-clamp-3');
            button.textContent = 'Read More';
        }
    }
</script>
@endsection
