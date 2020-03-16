@extends('layouts.goals')

@section('title', 'Sample_app')

<style>
  .create {
    font-size: 20px;
    margin: 0;
  }
  .content {
    margin-top: 20px;
  }
  .edit {
    margin-top: 20px;
    font-size: 20px;
  }
  
</style>
@section('content')

@foreach($goals as $goal)
@if ($loop->last)
    <div class="content">  
      <h1>目標</h1>
      <div class="shadow-sm p-3 mb-5 bg-white rounded">
        {{ $goal->mark }}
      </div>
    </div>
    <div class="content">
      <h1>現状</h1>
      <div class="shadow-sm p-3 mb-5 bg-white rounded">
        {{ $goal->now }}
      </div>
    </div>
    <div class="content">
      <h1>やること</h1>
      <div class="content">
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
          {{ $goal->todo }}
        </div>
      </div>
    </div>
    <div class="edit">
    <a href="/goals/{{ $goal->id }}/edit">編集</a>
    </div>

<form action="/goals/{{ $goal->id }}" method="POST">
  <input type="hidden" name="_method" value="DELETE">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endif
@endforeach

<div class="create">
<a href="/goals/create">作成</a>
</div>

@endsection
