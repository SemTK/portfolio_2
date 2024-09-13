@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-[1400px]">
    <h1 class="text-4xl font-bold mb-8 text-center">My Portfolio</h1>

    @auth
        <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Create New Project</a>
    @endauth

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($projects as $project)
        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105 hover:bg-gray-300 hover:shadow-lg">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" class="w-auto h-auto object-cover" alt="{{ $project->title }}">
            @endif
            <div class="p-4">
                <h5 class="text-lg font-bold">{{ $project->title }}</h5>
                <p class="text-gray-600 mt-2">{{ $project->description }}</p>

                @auth
                    <a href="{{ route('projects.edit', $project) }}" class="block mt-4 bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600">Edit</a>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
