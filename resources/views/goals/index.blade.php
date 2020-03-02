@extends('layouts.goals')

@section('title', 'Sample_app')

@section('content')

@foreach($goals as $goal)
<div class="content">  
      <h1>目標</h1>
        <input class="form-control form-control-lg" type="text" name="mark" placeholder="{{ $goal->mark }}">
    </div>
    <div class="content">
      <h1>現状</h1>
        <input class="form-control form-control-lg" type="text" name="now" placeholder="{{ $goal->now }}">
    </div>
    <div class="content">
      <h1>やること</h1>
      <div class="form-row">
        <input class="form-control form-control-lg" type="text" name="todo" placeholder="{{ $goal->todo }}">
      </div>
    </div>
</div>
<a href="/goals/{{ $goal->id }}/edit">編集</a>

<form action="/goals/{{ $goal->id }}" method="POST">
  <input type="hidden" name="_method" value="DELETE">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button type="submit">削除</button>
</form>
@endforeach
<a href="/goals/create">作成</a>

@endsection
