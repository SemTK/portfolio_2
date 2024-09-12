@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-[1200px]">
    <h1 class="text-3xl font-bold mb-8">Edit Project</h1>

    <!-- Edit form -->
    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="mb-8">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" class="w-full border-gray-300 rounded-lg shadow-sm">
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea id="description" name="description" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image</label>
            <input type="file" id="image" name="image" class="w-full border-gray-300 rounded-lg shadow-sm">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" class="w-32 h-32 mt-4" alt="{{ $project->title }}">
            @endif
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update Project</button>
    </form>

    <!-- Delete button -->
    <button id="deleteButton" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
        Delete Project
    </button>

    <!-- Modal for delete confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h2 class="text-lg font-bold mb-4">Confirm Deletion</h2>
            <p class="mb-4">Please type the name of the project (<strong>{{ $project->title }}</strong>) to confirm deletion.</p>

            <input type="text" id="confirmProjectName" placeholder="Type project name..." class="w-full border-gray-300 rounded-lg mb-4">

            <div class="flex justify-end">
                <button id="cancelDelete" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded mr-2">Cancel</button>
                <form id="deleteForm" action="{{ route('projects.destroy', $project) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button id="confirmDeleteButton" type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded" disabled>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButton = document.getElementById('deleteButton');
        const deleteModal = document.getElementById('deleteModal');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        const confirmProjectName = document.getElementById('confirmProjectName');
        const projectName = "{{ $project->title }}";

        deleteButton.addEventListener('click', function () {
            deleteModal.classList.remove('hidden');
        });

        cancelDelete.addEventListener('click', function () {
            deleteModal.classList.add('hidden');
        });

        confirmProjectName.addEventListener('input', function () {
            if (confirmProjectName.value === projectName) {
                confirmDeleteButton.removeAttribute('disabled');
            } else {
                confirmDeleteButton.setAttribute('disabled', true);
            }
        });
    });
</script>

@endsection
