@extends('layouts.app')
@section('title', 'Teams')
@section('content')
    <div class="container mx-auto text-center">
        <h1 class="text-center text-white mb-8 py-3" style="font-size: 48px; font-weight: bolder;">Teams</h1>
        <h2 class="text-center text-white mb-8 py-3" style="font-size: 24px;font-style: italic;">Here you can create, view, edit and delete team</h2>
        <div class=" text-right ">
            <a href="{{ route('teams.create') }}" class="hover:text-black font-bold py-2 px-4 rounded text-white">
                + Create New Team
            </a>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg inline-block">
            <table class="min-w-full w-1/2 leading-normal">
                <thead>
                <tr>
                    <th class="text-2xl text-center text-white font-bold px-6 py-3 underline" style="color: #ced2d4; font-style: italic  ">Team Name</th>
                    <th class="text-2xl text-center text-white font-bold px-6 py-3 underline" style="color: #ced2d4; font-style: italic  ">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr class="border-b border-gray-700">
                        <td class="text-white font-bold py-1" style="font-size: 22px">{{ $team->name }}</td>
                        <td class="px-6 py-3 text-center">
                            <a href="{{ route('teams.show', $team->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded ml-2" style="color: #ced2d4; font-style: italic">View</a>
                            <a href="{{ route('teams.edit', $team->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded ml-2" style="color: #ced2d4; font-style: italic">Edit</a>
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded ml-2 " style="color: #ced2d4; font-style: italic">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        th {
            display: inline-block;
            border-bottom: 2px solid white;
            width: 100%;
        }
    </style>
@endpush
