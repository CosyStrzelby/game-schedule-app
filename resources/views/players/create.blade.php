@extends('layouts.app')
@section('title', 'Create Player')
@section('content')
    <h1>Create Player</h1>
    <form action="{{ route('players.store') }}" method="POST">
        @csrf
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <label for="team_id">Team:</label>
        <select name="team_id" id="team_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->name }}</option>
            @endforeach
        </select>
        <label for="role">Position:</label>
        <select name="role" id="role" required>
            <option value="reserve">Reserve</option>
            <option value="starter">Starter</option>
        </select>
        <button type="submit">Create Player</button>
    </form>
@endsection
