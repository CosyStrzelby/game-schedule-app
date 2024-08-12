@extends('layouts.app')
@section('title', 'View Team')
@section('content')
    <h1>{{ $team->name }}</h1>
    <p>Team ID: {{ $team->id }}</p>
    <h2>Starters</h2>
    <ul>
        @foreach($starters as $player)
            <li>{{ $player->user->name }} ({{ $player->user->email }})</li>
        @endforeach
    </ul>
    <h2>Reserves</h2>
    <ul>
        @foreach($reserves as $player)
            <li>{{ $player->user->name }} ({{ $player->user->email }})</li>
        @endforeach
    </ul>
@endsection
