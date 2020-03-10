@extends('layouts.calendar2')
@section('title','sample_app')
<style>
    .today {
        background-color: #E6E6E6;
    }
</style>
@section('content')

<br>
<h1>{{ $display }}</h1>
<br>

<table class="table table-bordered">
    <tr>
        @foreach ($weeks as $week)
        <th>{{ $week }}</th>
        @endforeach
    </tr>
    @foreach ($dates as $array)
    <tr>
    @foreach ($array as $value)

    @if ($value == $today)
    <td class="today">{{ $value }}</td>
    @else
    <td>{{ $value }}</td>
    @endif
    @endforeach
    
    @endforeach
    </tr>
</table>

@endsection