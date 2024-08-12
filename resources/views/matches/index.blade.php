@extends('layouts.app')
@section('title', 'Matches')
@section('content')
    <h1>Matches</h1>
    <a href="{{ route('matches.create') }}">Create New Match</a>
    <ul>
        @foreach($matches as $match)
            <li>
                {{ $match->team1->name }} vs {{ $match->team2->name }} on {{ $match->match_date }}
                <a href="{{ route('matches.show', $match->id) }}">View</a>
                <a href="{{ route('matches.edit', $match->id) }}">Edit</a>
                <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
