@extends('layouts.app')

@section('title', 'Our Authors')

@section('styles')
@endsection

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-10 gap-4">
            <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Meet Our Authors</h1>
            <a href="{{ route('authors.create') }}"
                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300">
                <i class="fas fa-user-plus"></i>
                <span>Add New Author</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($authors as $author)
                <div class="author-card bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col">
                    <div class="p-6 flex-grow">
                        <div class="flex items-center gap-6 mb-4">
                            <div class="flex-shrink-0">
                                <img src="{{ $author->photo ? asset('storage/' . $author->photo) : 'https://placehold.co/100x100/e2e8f0/a0aec0?text=No+Photo' }}"
                                    alt="Photo of {{ $author->name }}" class="author-photo rounded-full object-cover">
                            </div>
                            <div class="flex-grow">
                                <h2 class="text-2xl font-bold text-gray-900">{{ $author->name }}</h2>
                            </div>
                        </div>

                        <div>
                            <p id="bio-{{ $author->id }}" class="author-bio text-gray-500 text-sm mt-1 line-clamp-2">
                                {{ $author->bio ?: 'No biography available.' }}</p>
                            @if (strlen($author->bio) > 100)
                                <button onclick="toggleBio({{ $author->id }})"
                                    class="text-xs text-indigo-600 hover:underline mt-2 font-semibold">Read More</button>
                            @endif
                        </div>

                        <div class="mt-6">
                            <h4 class="font-semibold text-gray-700 mb-2">Books by this Author</h4>
                            <div id="book-list-{{ $author->id }}" class="book-list space-y-3">
                                @forelse($author->books as $book)
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://placehold.co/40x60/e2e8f0/a0aec0?text=N/A' }}"
                                            class="w-10 h-14 object-cover rounded-sm shadow-sm">
                                        <span class="text-gray-800 font-medium">{{ $book->title }}</span>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-400 italic">This author has not published any books yet.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 mt-auto flex justify-between items-center">
                        @if ($author->books->isNotEmpty())
                            <button onclick="toggleBooks({{ $author->id }})"
                                class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                                View All Books
                            </button>
                        @else
                            <div></div>
                        @endif
                        <div class="flex gap-2">
                            <a href="{{ route('authors.edit', $author->id) }}"
                                class="text-gray-400 hover:text-blue-500 transition-colors" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')"
                                    class="text-gray-400 hover:text-red-500 transition-colors" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white rounded-2xl shadow-sm">
                    <i class="fas fa-users-slash text-6xl text-gray-300"></i>
                    <p class="mt-6 text-2xl font-semibold text-gray-600">No Authors Found.</p>
                    <p class="text-gray-400 mt-2">Click "Add New Author" to get started.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        function toggleBooks(authorId) {
            const bookList = document.getElementById(`book-list-${authorId}`);
            const button = event.target;

            bookList.classList.toggle('expanded');

            if (bookList.classList.contains('expanded')) {
                button.textContent = 'Hide Books';
            } else {
                button.textContent = 'View All Books';
            }
        }

        function toggleBio(authorId) {
            const bioElement = document.getElementById(`bio-${authorId}`);
            const button = event.target;

            if (bioElement.classList.contains('line-clamp-2')) {
                bioElement.classList.remove('line-clamp-2');
                button.textContent = 'Read Less';
            } else {
                bioElement.classList.add('line-clamp-2');
                button.textContent = 'Read More';
            }
        }
    </script>
@endsection
