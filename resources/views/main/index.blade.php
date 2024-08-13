@extends('layouts.app')
@section('title', 'Main')
@section('content')
    <div class="container mx-auto ">
        <h1 class="text-center text-white mb-8 py-3" style="font-size: 48px; font-weight: bolder;">Welcome Baller!</h1>
        <h2 class="text-center text-white mb-8 py-3" style="font-size: 24px; font-style: italic;">Here`s our actual teams with rosters</h2>
        <div class="bg-gray-800 p-6 rounded-lg text-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($teams as $team)
                    <div class="bg-gray-900 p-4 rounded-lg">
                        <h2 class="font-extrabold" style="font-size: 42px; color:#64417d; font-weight: 900;  -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #1a202c ">{{ $team->name }}</h2>
                        <!-- Starters -->
                        <h3 class="mt-2 text-lg font-semibold  border-b-2 border-white inline-block pb-1 " style="color: #ced2d4; font-style: italic  ">Starters</h3>
                        <ul class="mt-2">
                            @foreach($team->players->where('role', 'starter') as $player)
                                <li class="text-white font-bold py-1" style="font-size: 22px">{{ $player->user->name }}</li>
                            @endforeach
                        </ul>
                        <!-- Reserves -->
                        <h3 class="mt-2 text-lg font-semibold border-b-2 border-white inline-block pb-1 " style="color: #ced2d4; font-style: italic " >Reserves</h3>
                        <ul class="mt-2">
                            @foreach($team->players->where('role', 'reserve') as $player)
                                <li class="text-white font-bold py-1" style="font-size: 22px">{{ $player->user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
