@extends('layouts.app')

@section('title', 'Edit Author: ' . $author->name)

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-12">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Edit Author Profile</h1>
            <p class="text-gray-500 mt-2">Update the details for {{ $author->name }}.</p>
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

        <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-10 gap-y-8">

                <div class="md:col-span-1 flex flex-col items-center justify-center">
                    <label for="photo" class="font-semibold text-gray-700 mb-2">Author's Photo</label>
                    <div id="image-preview-wrapper" class="w-48 h-48 cursor-pointer">
                        <div class="file-input-placeholder w-full h-full bg-gray-50 border-2 border-dashed border-gray-300 rounded-full flex items-center justify-center text-center p-4 {{ $author->photo ? 'hidden' : '' }}">
                            <div id="placeholder-text">
                                <i class="fas fa-camera text-3xl text-gray-400"></i>
                                <p class="text-xs text-gray-500 mt-2">Click to upload</p>
                            </div>
                        </div>
                        <img id="image-preview" src="{{ $author->photo ? asset('storage/' . $author->photo) : '' }}" alt="Photo Preview" class="{{ $author->photo ? '' : 'hidden' }} w-full h-full object-cover rounded-full shadow-md"/>
                    </div>
                    <input type="file" name="photo" id="photo" class="hidden" accept="image/png, image/jpeg, image/jpg">
                    <button type="button" onclick="document.getElementById('photo').click()" class="mt-4 text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                        Change Photo
                    </button>
                </div>

                <div class="md:col-span-2 space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name', $author->name) }}" required>
                    </div>
                    <div>
                        <label for="bio" class="block text-sm font-medium text-gray-700">Biography</label>
                        <textarea name="bio" id="bio" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('bio', $author->bio) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-12 pt-6 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('authors.index') }}" class="py-2 px-6 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">Cancel</a>
                <button type="submit" class="py-2 px-6 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">Update Author</button>
            </div>
        </form>
    </div>
</div>

<script>
    const photoInput = document.getElementById('photo');
    const imagePreview = document.getElementById('image-preview');
    const placeholder = document.querySelector('.file-input-placeholder');

    photoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
