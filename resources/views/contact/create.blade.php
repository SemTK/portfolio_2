@extends('layouts.app')

@section('content')

@auth
    @foreach ($contactData as $contact)
        <h3>Name:{{ $contact->name}}</h3>
        <p>Email: {{ $contact->email }}</p>
        <p>Message: {{ $contact->message }}</p>
    @endforeach
@endauth

<div class="container mx-auto max-w-[1200px]">
    <h1 class="text-3xl font-bold mb-8">Contact Us</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="w-full max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-lg shadow-sm">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded-lg shadow-sm">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
            <textarea id="message" name="message" class="w-full border-gray-300 rounded-lg shadow-sm" rows="5">{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Send Message</button>
    </form>
</div>
@endsection
