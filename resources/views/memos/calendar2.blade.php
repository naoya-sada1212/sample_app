@extends('layouts.calendar2')
@section('title','sample_app')
<style>
    .today {
        background-color: red;
    }
</style>
@section('content')
<h3><a href="?ym={{ $prev }}">&lt;</a>{{ $newDate->year }}年{{ $newDate->month }}月<a href="?ym={{ $next }}">&gt;</a></h3>

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
    @foreach ($dates as $array)
    <tr>
      @foreach ($array as $value)
       @if ($value == $today)
      <td class="today">
          <a href="/calendar4?x={{ $value }}">{{ $value }}</a>
      </td>
      @else
      <td>
          <a href="/calendar4?x={{ $value }}">{{ $value }}</a>
      </td>
      @endif
      @endforeach
     </tr>
     @endforeach
</table>
@endsection