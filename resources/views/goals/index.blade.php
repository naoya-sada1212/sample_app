@extends('layouts.goals')

@section('title', 'Sample_app')

<style>
  .create {
    font-size: 20px;
    margin: 0;
    margin-left:30px;
  }
  .edit {
    margin-left:30px;
    margin-top: 20px;
    font-size: 20px;
  }
  h1 {
    margin: 30px !important;
    margin-bottom: 0 !important;
  }
  .content {
    width: 700px;
    height: 50px;
    border: 1px solid #D8D8D8;
    margin-left: 30px;
  }
  .content2 {
    width: 700px;
    height: 150px;
    border: 1px solid #D8D8D8;
    margin-left: 30px;
  }
  .content p {
    font-size: 30px;
  }
  .content2 p {
    font-size: 30px;
  }
</style>
@section('content')

@foreach($goals as $goal)
@if ($loop->last)
      <h1>目標</h1>
      <div class="content">
        <p>{{ $goal->mark }}</p>
      </div>
    
      <h1>現状</h1>
      <div class="content">
        <p>{{ $goal->now }}</p>
      </div>
        
      <h1>やること</h1>
      <div class="content2">
        <p>{{ $goal->todo }}</p>
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
