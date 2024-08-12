@extends('layouts.app')
@section('title', 'Players')
@section('content')
    <h1>Players</h1>
    <a href="{{ route('players.create') }}">Create New Player</a>
    <ul>
        @foreach($players as $player)
            <li>
                {{ $player->user->name }} - {{ $player->team->name }} - {{ $player->role }}
                <a href="{{ route('players.show', $player->id) }}">View</a>
                <a href="{{ route('players.edit', $player->id) }}">Edit</a>
                <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
