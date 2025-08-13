@extends('layouts.app')

@section('title', 'Your Digital Bookshelf')

{{-- Bagian style ini tidak lagi diperlukan dan bisa dihapus atau dikosongkan --}}
@section('styles')
@endsection

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Header dengan judul dan tombol Add Book --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10 gap-4">
        <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Digital Bookshelf</h1>
        <a href="{{ route('books.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
            <i class="fas fa-plus-circle"></i>
            <span>Add New Book</span>
        </a>
    </div>

    {{-- Notifikasi 'success' --}}
    @if(session('success'))
        <div id="toast-success" class="fixed top-24 right-5 bg-green-500 text-white py-3 px-6 rounded-lg shadow-xl z-50 flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Daftar Buku dengan Layout Masonry --}}
    <div class="masonry-grid">
        @forelse($books as $index => $book)
            <div class="book-item" style="animation-delay: {{ $index * 70 }}ms;">
                <div class="book-cover-wrapper group">
                    <div class="book-cover" style="background-image: url('{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://placehold.co/400x600/e2e8f0/a0aec0?text=No+Cover' }}');">
                        <div class="action-overlay absolute inset-0 bg-black/60 flex flex-col items-center justify-center gap-3">
                            <a href="{{ route('books.edit', $book->id) }}" class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm text-white flex items-center justify-center transform hover:bg-white/30 hover:scale-110 transition-all duration-200" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this book?')" class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm text-white flex items-center justify-center transform hover:bg-white/30 hover:scale-110 transition-all duration-200" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                            <button onclick='showBookDetails(@json($book))' class="w-11 h-11 rounded-full bg-white/20 backdrop-blur-sm text-white flex items-center justify-center transform hover:bg-white/30 hover:scale-110 transition-all duration-200" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="font-bold text-lg text-gray-800 truncate" title="{{ $book->title }}">{{ $book->title }}</h3>
                    <p class="text-sm text-gray-500">by {{ $book->author->name }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-2xl shadow-sm">
                <i class="fas fa-box-open text-6xl text-gray-300"></i>
                <p class="mt-6 text-2xl font-semibold text-gray-600">Your bookshelf is empty.</p>
                <p class="text-gray-400 mt-2">Let's add your first book to the collection!</p>
            </div>
        @endforelse
    </div>
</div>

{{-- Modal untuk Detail Buku --}}
<div id="bookDetailModal" class="modal fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50 p-4">
    <div class="modal-content bg-white rounded-lg shadow-2xl w-full max-w-lg max-h-full overflow-y-auto p-8 relative transform scale-95">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-800 transition-colors duration-300">
            <i class="fas fa-times fa-2x"></i>
        </button>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/3 flex-shrink-0">
                <img id="modal-cover" src="" alt="Book Cover" class="w-full h-auto rounded-lg shadow-lg">
            </div>
            <div class="md:w-2/3">
                <span id="modal-category" class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded-full mb-2"></span>
                <h2 id="modal-title" class="text-3xl font-bold text-gray-900"></h2>
                <p class="text-lg text-gray-500 mt-1">by <span id="modal-author" class="font-medium"></span></p>
                <p class="text-sm text-gray-400 mt-1">Published in <span id="modal-year"></span></p>

                <div class="border-t my-4"></div>

                <h4 class="font-semibold text-gray-800 mb-2">Description</h4>
                <p id="modal-description" class="text-gray-600 text-base leading-relaxed"></p>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript untuk Modal dan Notifikasi --}}
<script>
    const modal = document.getElementById('bookDetailModal');
    const modalContent = modal.querySelector('.modal-content');

    function showBookDetails(book) {
        const coverUrl = book.cover_image ? `{{ asset('storage') }}/${book.cover_image}` : 'https://placehold.co/400x600/e2e8f0/a0aec0?text=No+Cover';
        document.getElementById('modal-cover').src = coverUrl;
        document.getElementById('modal-title').textContent = book.title;
        document.getElementById('modal-author').textContent = book.author.name;
        document.getElementById('modal-category').textContent = book.category.name;
        document.getElementById('modal-year').textContent = book.published_year;
        document.getElementById('modal-description').textContent = book.description || 'No description available.';

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-95');
        }, 10);
    }

    function closeModal() {
        modal.classList.remove('opacity-100');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }

    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    setTimeout(() => {
        document.getElementById('toast-success')?.remove();
    }, 4000);
</script>
@endsection
