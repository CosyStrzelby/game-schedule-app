@extends('layouts.app')
@section('title', 'View Player')
@section('content')
    <h1>{{ $player->user->name }}</h1>
    <p>Team: {{ $player->team->name }}</p>
    <p>Email: {{ $player->user->email }}</p>
    <p>Role: {{ ucfirst($player->role) }}</p>
@endsection
