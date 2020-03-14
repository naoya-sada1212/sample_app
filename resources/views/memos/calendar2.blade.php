@extends('layouts.calendar2')
@section('title','sample_app')
<style>
    .today {
        background-color: #E6E6E6;
    }
    table {
       height: 500px;
    }
    th {
        text-align: center !important;
        height: 60px;
        
    }
    th:nth-of-type(1), td:nth-of-type(1) {
        background-color: #F8E0E0;
    }
    th:nth-of-type(7), td:nth-of-type(7) {
        background-color: #E0ECF8;
    }
</style>
@section('content')
<h3><a href="?ym={{ $prev }}">&lt;</a>{{ $display->year }}年{{ $display->month }}月<a href="?ym={{ $next }}">&gt;</a></h3>

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
    @if ($value == $today->day)
    <td class="today"><a href="#">{{ $value }}</a></td>
    @else
    <td><a href="#">{{ $value }}</a></td>
    @endif
    @endforeach
    @endforeach
    </tr>
</table>

@endsection