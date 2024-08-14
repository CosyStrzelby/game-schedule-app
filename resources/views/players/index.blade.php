@extends('layouts.app')
@section('title', 'Players')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8 py-3" style="font-size: 48px; font-weight: bolder;">Players</h1>
        <div class="text-right mb-4">
            <a href="{{ route('players.create') }}" class="hover:text-gray-500 font-bold py-2 px-4 rounded text-white px-20">
               + Create New Player
            </a>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg">
            <table class="min-w-full bg-gray-900 w-full">
                <thead>
                <tr>
                    <th class=" text-2xl py-3 px-6 text-left text-white">Name</th>
                    <th class="text-2xl py-3 px-6 text-left text-white">Team</th>
                    <th class="text-2xl py-3 px-6 text-left text-white">Role</th>
                    <th class="text-2xl py-3 px-6 text-center text-white">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($players as $player)
                    <tr class="border-b border-gray-700">
                        <td class="py-3 px-6 text-left text-white font-bold">{{ $player->user->name }}</td>
                        <td class="py-3 px-6 text-left text-white italic">{{ $player->team->name }}</td>
                        <td class="py-3 px-6 text-left text-white italic">{{ ucfirst($player->role) }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('players.show', $player->id) }}" class="bg-green-500 hover:bg-green-700 text-white hover:text-gray-800 font-bold py-1 px-3 rounded ml-2" style="color: #ced2d4; font-style: italic">View</a>
                            <a href="{{ route('players.edit', $player->id) }}" class="bg-green-500 hover:bg-green-700 text-white hover:text-gray-800 font-bold py-1 px-3 rounded ml-2" style="color: #ced2d4; font-style: italic">Edit</a>
                            <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white hover:text-gray-800 font-bold py-1 px-3 rounded ml-2" style="color: #ced2d4; font-style: italic">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
