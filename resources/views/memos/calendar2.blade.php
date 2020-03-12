@extends('layouts.calendar2')
@section('title','sample_app')
<style>
    .today {
        background-color: #E6E6E6;
    }
</style>
@section('content')
<h3><a href="?ym={{ $prev }}">&lt;</a>{{ $day->year }}年{{ $day->month }}月<a href="?ym={{ $next }}">&gt;</a></h3>
<br>

<br>

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

    @if ($value === $today->day)
    <td class="today">{{ $value }}</td>
    @else
    <td>{{ $value }}</td>
    @endif
   
    @endforeach
    @endforeach
    </tr>
</table>

@endsection