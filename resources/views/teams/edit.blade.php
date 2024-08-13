@extends('layouts.app')
@section('title', 'Edit Team')
@section('content')
    <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">Edit Team</h1>
    <div class="container mx-auto flex justify-center">
        <div class="bg-gray-800 p-6 rounded-lg w-full max-w-lg">
            <form action="{{ route('teams.update', $team->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-white font-bold mb-2">Team Name:</label>
                    <input type="text" name="name" id="name" value="{{ $team->name }}" required class="w-full px-3 py-2 text-gray-700 bg-gray-200 rounded-lg">
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Team</button>
                </div>
            </form>
        </div>
    </div>
@endsection
