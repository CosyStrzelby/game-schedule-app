@extends('layouts.app')
@section('title', 'View Team')
@section('content')
    <h1>{{ $team->name }}</h1>
    <p>Team ID: {{ $team->id }}</p>
    <!-- Tu możemy dodać listę players, gdy będą gotowe -->
@endsection
