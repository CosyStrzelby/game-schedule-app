@extends('layouts.app')
@section('title', 'Edit Player')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">Edit Player</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <form action="{{ route('players.update', $player->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="user_id" class="block text-white font-bold mb-2">User:</label>
                    <select name="user_id" id="user_id" class="form-select mt-1 block w-full" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $player->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="team_id" class="block text-white font-bold mb-2">Team:</label>
                    <select name="team_id" id="team_id" class="form-select mt-1 block w-full" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-white font-bold mb-2">Role:</label>
                    <select name="role" id="role" class="form-select mt-1 block w-full" required>
                        <option value="reserve" {{ $player->role == 'reserve' ? 'selected' : '' }}>Reserve</option>
                        <option value="starter" {{ $player->role == 'starter' ? 'selected' : '' }}>Starter</option>
                    </select>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Player
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
