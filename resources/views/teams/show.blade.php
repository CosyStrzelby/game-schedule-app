@extends('layouts.app')
@section('title', 'View Team')
@section('content')
    <div class="container mx-auto flex justify-center">
        <div>
            <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">{{ $team->name }}</h1>
            <div class="bg-gray-800 p-6 rounded-lg text-center">
                <p class="text-white font-bold mb-4">Roster:</p>
                <div class="flex justify-center space-x-8">
                    <div class="w-1/2">
                        <h2 class="text-white font-bold text-xl mb-4">Starters</h2>
                        <ul class="list-decimal list-inside space-y-4">
                            @foreach($starters as $index => $player)
                                <li class="text-white font-bold">{{ $index + 1 }}. {{ $player->user->name }} ({{ $player->user->email }})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-1/2">
                        <h2 class="text-white font-bold text-xl mb-4">Reserves</h2>
                        <ul class="list-decimal list-inside space-y-4">
                            @foreach($reserves as $index => $player)
                                <li class="text-white font-bold">{{ $index + 1 }}. {{ $player->user->name }} ({{ $player->user->email }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection











