@extends('layouts.app')
@section('title', 'Create Team')
@section('content')
    <h1>Create Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <label for="name">Team Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Create Team</button>
    </form>
@endsection
