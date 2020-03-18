@extends('layouts.calendar2')
@section('title','sample_app')
<style>
    .today {
        background-color: red;
    }
</style>
@section('content')
<form method="post" action="/calendar">
    {{ csrf_field() }}
    <input type="submit" name="prev" value="{{ $prev }}">
</form>
<h3>{{ $newDate->year }}年{{ $newDate->month }}月</h3>
<form method="post" action="/calendar">
    {{ csrf_field() }}
    <input type="submit" name="next" value="{{ $next }}">
</form>

<table class="table table-bordered">
    <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
    </tr>
    @foreach($dates as $key)
    <tr>
        @foreach($key as $value)
        @if ($value == $today->day && $newDate->year == $today->year && $newDate->month == $today->month)
        <td class="today">
          <form method="post" action="/calendar4"> 
          {{ csrf_field() }}
            <input type="hidden" name="x" value="{{$newDate->format('Y-m')}}-{{$value}}">
            <input type="submit" value="{{$value}}">
          </form>
        </td>
        @else
        <td>
          <form method="post" action="/calendar4">
              {{ csrf_field() }}
            <input type="hidden" name="x" value="{{$newDate->format('Y-m')}}-{{$value}}">
            <input type="submit" value="{{$value}}">
          </form>
        </td>
        @endif
        @endforeach
    </tr>
    @endforeach
</table>

@endsection
