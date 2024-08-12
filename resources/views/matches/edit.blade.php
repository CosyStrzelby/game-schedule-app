@extends('layouts.app')
@section('title', 'Edit Match')
@section('content')
    <h1>Edit Match</h1>
    <form action="{{ route('matches.update', $match->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="team1_id">Team 1:</label>
        <select name="team1_id" id="team1_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ $team->id == $match->team1_id ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>
        <label for="team2_id">Team 2:</label>
        <select name="team2_id" id="team2_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ $team->id == $match->team2_id ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>
        <label for="match_date">Match Date:</label>
        <input type="datetime-local" name="match_date" id="match_date" value="{{ $match->match_date->format('Y-m-d\TH:i') }}" required>
        <button type="submit">Update Match</button>
    </form>
@endsection
