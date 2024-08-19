@extends('layouts.app')
@section('title', 'Participation Confirmed')
@section('content')
    <div class="container mx-auto">
        <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">
            Participation Status Updated
        </h1>
        <div class="bg-gray-800 p-6 rounded-lg">
            @if($response === 'accept')
                <p class="text-white">Thank you, {{ $player->user->name }}! You have been added to the match between {{ $match->team1->name }} and {{ $match->team2->name }} on {{ $match->match_date }}.</p>
            @elseif($response === 'decline')
                <p class="text-white">You have declined the invitation for the match between {{ $match->team1->name }} and {{ $match->team2->name }} on {{ $match->match_date }}.</p>
            @endif
            <a href="{{ route('matches.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back to Matches
            </a>
        </div>
    </div>
@endsection
