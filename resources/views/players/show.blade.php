@extends('layouts.app')
@section('title', 'View Player')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">{{ $player->user->name }}</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <p class="text-white font-bold">Team: <span class="font-normal">{{ $player->team->name }}</span></p>
            <p class="text-white font-bold">Email: <span class="font-normal">{{ $player->user->email }}</span></p>
            <p class="text-white font-bold">Role: <span class="italic">{{ ucfirst($player->role) }}</span></p>
        </div>
    </div>
@endsection
