@extends('layouts.app')

@section('title', 'Add a New Book')

@section('styles')
@endsection

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-12">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Add to Your Collection</h1>
            <p class="text-gray-500 mt-2">Fill in the details to add a new book to your digital bookshelf.</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg" role="alert">
                <p class="font-bold">Oops! Something went wrong.</p>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-8">

                <div class="flex flex-col items-center justify-center">
                    <label for="cover_image" class="font-semibold text-gray-700 mb-2">Cover Image</label>
                    <div id="image-preview-wrapper" class="w-full max-w-xs cursor-pointer">
                        <div class="file-input-placeholder w-full aspect-[2/3] bg-gray-50 border-2 border-gray-300 rounded-lg flex items-center justify-center text-center p-4">
                            <div id="placeholder-text" class="z-10">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                <p class="text-gray-500 mt-2">Click to upload or drag & drop</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG, JPEG (Max 2MB)</p>
                            </div>
                            <img id="image-preview" src="" alt="Image Preview" class="hidden absolute top-0 left-0 w-full h-full object-cover"/>
                        </div>
                    </div>
                    <input type="file" name="cover_image" id="cover_image" class="hidden" accept="image/png, image/jpeg, image/jpg">
                    <button type="button" id="change-image-btn" onclick="document.getElementById('cover_image').click()" class="mt-4 text-sm text-indigo-600 hover:text-indigo-800 font-semibold">Choose Image</button>
                </div>

                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('title') }}">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="author_id" class="block text-sm font-medium text-gray-700">Author</label>
                            <select name="author_id" id="author_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                     <div>
                        <label for="published_year" class="block text-sm font-medium text-gray-700">Published Year</label>
                        <input type="number" name="published_year" id="published_year" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('published_year') }}" placeholder="e.g., 2024">
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-6 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('books.index') }}" class="py-2 px-6 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">Cancel</a>
                <button type="submit" class="py-2 px-6 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">Save Book</button>
            </div>
        </form>
    </div>
</div>

<script>
    const coverImageInput = document.getElementById('cover_image');
    const imagePreview = document.getElementById('image-preview');
    const imagePreviewWrapper = document.getElementById('image-preview-wrapper');
    const placeholderText = document.getElementById('placeholder-text');
    const changeImageBtn = document.getElementById('change-image-btn');

    imagePreviewWrapper.addEventListener('click', () => {
        coverImageInput.click();
    });

    coverImageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
