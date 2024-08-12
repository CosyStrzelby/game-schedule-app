@extends('layouts.app')
@section('title', 'Edit Player')
@section('content')
    <h1>Edit Player</h1>
    <form action="{{ route('players.update', $player->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $player->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
        </select>
        <label for="team_id">Team:</label>
        <select name="team_id" id="team_id" required>
            @foreach($teams as $team)
                <option value="{{ $team->id }}" {{ $team->id == $player->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
            @endforeach
        </select>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="reserve" {{ $player->role == 'reserve' ? 'selected' : '' }}>Reserve</option>
            <option value="starter" {{ $player->role == 'starter' ? 'selected' : '' }}>Starter</option>
        </select>
        <button type="submit">Update Player</button>
    </form>
@endsection
