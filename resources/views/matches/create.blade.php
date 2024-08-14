@extends('layouts.app')
@section('title', 'Create Match')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">Create Match</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <form action="{{ route('matches.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="team1_id" class="block text-white font-bold mb-2">Team 1:</label>
                    <select name="team1_id" id="team1_id" class="form-select mt-1 block w-full" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="team2_id" class="block text-white font-bold mb-2">Team 2:</label>
                    <select name="team2_id" id="team2_id" class="form-select mt-1 block w-full" required>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="match_date" class="block text-white font-bold mb-2">Match Date:</label>
                    <input type="datetime-local" name="match_date" id="match_date" class="form-input mt-1 block w-full" required>
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Match
                    </button>
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                        Done
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
