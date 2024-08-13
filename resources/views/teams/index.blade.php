@extends('layouts.app')
@section('title', 'Teams')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">Teams</h1>
        <div class="text-right mb-4">
            <a href="{{ route('teams.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
               + Create New Team
            </a>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg">
            <table class="min-w-full leading-normal w-full">
                <thead>
                <tr>
                    <th class="text-2xl text-center text-white font-bold px-6 py-3">Name</th>
                    <th class="text-2xl text-center text-white font-bold px-6 py-3">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr class="border-b border-gray-700">
                        <td class="text-white text-center font-bold px-6 py-3">{{ $team->name }}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('teams.show', $team->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded ml-2">View</a>
                            <a href="{{ route('teams.edit', $team->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded ml-2">Edit</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
