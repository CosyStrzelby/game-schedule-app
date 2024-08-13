@extends('layouts.app')
@section('title', 'View Team')
@section('content')
    <div class="container mx-auto flex justify-center">
        <div>
            <h1 class="text-center text-white mb-8 py-3" style="font-size: 48px; font-weight: bolder;">{{ $team->name }}</h1>
            <div class="bg-gray-800 p-6 rounded-lg text-center">
                <p class="mt-2 text-lg font-semibold   pb-1 " style="color: #ced2d4; font-style: italic ">Roster:</p>
                <div class="flex justify-center space-x-8 ">
                    <div class="w-1/2">
                        <h2 class="mt-2 text-lg font-semibold border-b-2 border-white inline-block pb-1 " style="color: #ced2d4; font-style: italic ">Starters</h2>
                        <ul class="list-decimal list-inside space-y-8 px-3 py-3">
                            @foreach($starters as $index => $player)
                                <li class="text-white font-bold py-1" style="font-size: 22px">{{ $index + 1 }}. {{ $player->user->name }} ({{ $player->user->email }})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-1/2">
                        <h2 class="mt-2 text-lg font-semibold border-b-2 border-white inline-block pb-1 " style="color: #ced2d4; font-style: italic ">Reserves</h2>
                        <ul class="list-decimal list-inside space-y-4 px-3 py-3">
                            @foreach($reserves as $index => $player)
                                <li class="text-white font-bold py-1" style="font-size: 22px">{{ $index + 1 }}. {{ $player->user->name }} ({{ $player->user->email }})</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection











