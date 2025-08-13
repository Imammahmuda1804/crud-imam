@extends('layouts.app')

@section('title', 'Edit Category: ' . $category->name)

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-12">

        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Edit Category</h1>
            <p class="text-gray-500 mt-2">Update the details for the "{{ $category->name }}" category.</p>
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

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('name', $category->name) }}" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $category->description) }}</textarea>
                </div>

            </div>

            <div class="mt-12 pt-6 border-t border-gray-200 flex justify-end gap-4">
                <a href="{{ route('categories.index') }}" class="py-2 px-6 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">Cancel</a>
                <button type="submit" class="py-2 px-6 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
