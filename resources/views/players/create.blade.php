@extends('layouts.app')
@section('title', 'Create Player')
@section('content')
    <h1>Create Player</h1>
    <form action="{{ route('players.store') }}" method="POST">
        @csrf
        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" id="user_id" required>
        <label for="team_id">Team ID:</label>
        <input type="number" name="team_id" id="team_id" required>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="starter">Starter</option>
            <option value="reserve">Reserve</option>
        </select>
        <button type="submit">Create Player</button>
    </form>
@endsection
