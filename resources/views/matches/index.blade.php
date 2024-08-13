@extends('layouts.app')
@section('title', 'Matches')
@section('content')
    <h1 class="text-center text-white mb-8" style="font-size: 36px; font-weight: bold;">Matches</h1>
    <div class="container mx-auto mb-4 text-right" >
        <a href="{{ route('matches.create') }}" class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
           + Create New Match
        </a>
    </div>
    <div class="container mx-auto flex justify-center">
        <div class="bg-gray-800 p-6 rounded-lg w-full max-w-4xl">
            <div class="calendar">
                <div class="header flex justify-center mb-4">
                    <div class="month-year text-2xl font-bold text-white">
                        {{ $monthYear }}
                    </div>
                </div>
                <div class="days grid grid-cols-7 gap-1">
                    @foreach($daysOfWeek as $day)
                        <div class="day_name text-center p-2 bg-blue-500 text-white rounded">{{ $day }}</div>
                    @endforeach
                    @for ($i = 0; $i < $paddingDays; $i++)
                        <div class="day_num ignore bg-gray-700 text-gray-500 p-2 rounded"></div>
                    @endfor
                    @for ($i = 1; $i <= $numDays; $i++)
                        <div class="day_num text-center p-2 bg-gray-700 text-white rounded">
                            <span>{{ $i }}</span>
                            @foreach($events as $event)
                                @if (date('Y-m-d', strtotime($event->date)) == date('Y-m-' . $i))
                                    <div class="event bg-blue-500 rounded p-1 mt-1">
                                        {{ $event->name }} <br> {{ date('H:i', strtotime($event->date)) }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                    @for ($i = 1; $i <= (42 - $numDays - max($paddingDays, 0)); $i++)
                        <div class="day_num ignore bg-gray-700 text-gray-500 p-2 rounded"></div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .calendar {
        display: flex;
        flex-flow: column;
    }
    .calendar .header .month-year {
        font-size: 20px;
        font-weight: bold;
        color: white;
        padding: 20px 0;
    }
    .calendar .days {
        display: flex;
        flex-flow: wrap;
    }
    .calendar .days .day_name {
        width: calc(100% / 7);
        border-right: 1px solid #2c7aca;
        padding: 20px;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        color: #818589;
        color: #fff;
        background-color: #818589;
    }
    .calendar .days .day_name:nth-child(7) {
        border: none;
    }
    .calendar .days .day_num {
        display: flex;
        flex-flow: column;
        width: calc(100% / 7);
        border-right: 1px solid #e6e9ea;
        border-bottom: 1px solid #e6e9ea;
        padding: 15px;
        font-weight: bold;
        color: white;
        cursor: pointer;
        min-height: 100px;
    }
    .calendar .days .day_num span {
        display: inline-flex;
        width: 30px;
        font-size: 14px;
    }
    .calendar .days .day_num .event {
        margin-top: 10px;
        font-weight: 500;
        font-size: 14px;
        padding: 3px 6px;
        border-radius: 4px;
        background-color: #818589;
        color: #fff;
        word-wrap: break-word;
    }
    .calendar .days .day_num .event.green {
        background-color: #51ce57;
    }
    .calendar .days .day_num .event.blue {
        background-color: #518fce;
    }
    .calendar .days .day_num .event.red {
        background-color: #ce5151;
    }
    .calendar .days .day_num:nth-child(7n+1) {
        border-left: 1px solid #e6e9ea;
    }
    .calendar .days .day_num:hover {
        background-color: #313538;
    }
    .calendar .days .day_num.ignore {
        background-color: #2D3D54;
        color: #ced2d4;
        cursor: inherit;
    }
    .calendar .days .day_num.selected {
        background-color: #f1f2f3;
        cursor: inherit;
    }
</style>
