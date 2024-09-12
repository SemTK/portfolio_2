@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-center">Create New Project</h1>

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Project Title</label>
            <input type="text" name="title" id="title" class="form-input w-full border border-gray-300 rounded-lg p-2" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Project Description</label>
            <textarea name="description" id="description" class="form-textarea w-full border border-gray-300 rounded-lg p-2">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Project Image</label>
            <input type="file" name="image" id="image" class="form-input w-full border border-gray-300 rounded-lg p-2">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">Create Project</button>
    </form>
</div>
@endsection
