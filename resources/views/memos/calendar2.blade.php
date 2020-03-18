@extends('layouts.calendar2')
@section('title','sample_app')
<style>
    .today {
        background-color: #F2F5A9 !important;
    }
    h1 {
        margin: 30px !important;
    }
    th {
        height: 20px;
        text-align: center !important;
    }
    td {
        height: 70px;
    }
    th:nth-of-type(1),td:nth-of-type(1) {
        background-color: #F8E0E0;
    }
    th:nth-of-type(7),td:nth-of-type(7) {
        background-color: #E0ECF8;
    }
</style>
@section('content')

<h1><a href="?ym={{ $prev }}">&lt;</a>{{ $newDate->year }}年{{ $newDate->month }}月<a href="?ym={{$next}}">&gt;</a></h1>

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
        @if ($value == $today->day && $newDate->year == $today->year && $newDate->month == $today->month)
      <td class="today">
          <a href="/calendar4?x={{ $newDate->format('Y-n') }}-{{ $value }}">{{ $value }}</a>
      </td>
      @else
      <td>
          <a href="/calendar4?x={{ $newDate->format('Y-n') }}-{{ $value }}">{{ $value }}</a>
      </td>
      @endif
      @endforeach
     </tr>
     @endforeach
</table>
@endsection