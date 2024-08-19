@extends('layouts.app')
@section('title', 'Match Details')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8 py-3" style="font-size: 48px; font-weight: bolder;">Match Details</h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            <!-- Data i godzina meczu -->
            <div class="text-center text-white py-3 mb-8" style="font-size: 24px; font-weight: bold;">
                {{ \Carbon\Carbon::parse($match->match_date)->format('l, F j, Y - H:i') }}
            </div>
            <!-- Drużyny i gracze w dwóch oddzielnych sekcjach -->
            <div class="grid grid-cols-2 gap-8 py-3" >
                <!-- Sekcja dla drużyny 1 -->
                <div class="bg-gray-700 p-4 rounded-lg">
                    <h2 class="text-center text-white mb-4 font-bold" style="font-size: 64px; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #1a202c; color: #64417d; font-style: italic">{{ $match->team1->name }}</h2>
                    <ul class="list-inside text-white text-center font-bold" style="font-size: 32px; color: #cbd5e0 ">
                        @foreach ($match->players->where('team_id', $match->team1->id)->values() as $index => $player)
                            <li>{{ $index + 1 }}. {{ $player->user->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <!-- Sekcja dla drużyny 2 -->
                <div class="bg-gray-700 p-4 rounded-lg">
                    <h2 class="text-center text-white mb-4" style="font-size: 64px; font-weight: bolder;-webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #1a202c; color: #64417d; font-style: italic">{{ $match->team2->name }}</h2>
                    <ul class="list-inside text-white text-center font-bold" style="font-size: 32px; color: #cbd5e0 ">
                        @foreach ($match->players->where('team_id', $match->team2->id)->values() as $index => $player)
                            <li>{{ $index + 1 }}. {{ $player->user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
