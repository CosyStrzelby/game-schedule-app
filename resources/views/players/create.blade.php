@extends('layouts.app')
@section('title', 'Create Player')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">Create Player</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <form action="{{ route('players.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="user_id" class="block text-white font-bold mb-2">User:</label>
                    <select name="user_id" id="user_id" class="form-select mt-1 block w-full" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="team_id" class="block text-white font-bold mb-2">Team:</label>
                    <select name="team_id" id="team_id" class="form-select mt-1 block w-full" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-white font-bold mb-2">Position:</label>
                    <select name="role" id="role" class="form-select mt-1 block w-full" required>
                        <option value="reserve">Reserve</option>
                        <option value="starter">Starter</option>
                    </select>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Player
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
