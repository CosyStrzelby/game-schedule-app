@extends('layouts.app')
@section('title', 'Create Match')
@section('content')
    <h1>Create Match</h1>
    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        <label for="team1_id">Team 1:</label>
        <select name="team1_id" id="team1_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <label for="team2_id">Team 2:</label>
        <select name="team2_id" id="team2_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <label for="match_date">Match Date:</label>
        <input type="datetime-local" name="match_date" id="match_date" required>
        <button type="submit">Create Match</button>
        <button type="button">Done</button>
    </form>
@endsection





