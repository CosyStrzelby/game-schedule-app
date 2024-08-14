@extends('layouts.app')
@section('content')
    <div class="container mx-auto text-center">
        <h1 class="font-extrabold py-16" style="font-size: 64px; color:#64417d; font-weight: 900;  -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: #1a202c ">Please Log in or Register</h1>
        @guest
            <div class="text-center">
                <a href="{{ route('login') }}" class="mt-2 text-lg font-semibold   pb-1 px-3 " style="font-size: 32px; color: #ced2d4; font-style: italic  ">Log in</a>
                <a href="{{ route('register') }}" class="mt-2 text-lg font-semibold   pb-1 px-3" style="font-size: 32px; color: #ced2d4; font-style: italic  ">Register</a>
            </div>
        @endguest
    </div>
@endsection
