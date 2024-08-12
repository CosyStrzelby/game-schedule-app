@extends('layouts.app')
@section('title', 'View Match')
@section('content')
    <h1>Match Details</h1>
    <p>{{ $match->team1->name }} vs {{ $match->team2->name }} on {{ $match->match_date }}</p>
@endsection
