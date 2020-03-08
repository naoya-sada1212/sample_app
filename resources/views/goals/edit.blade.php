@extends('layouts.goals')

@section('title', 'Sample_app')
<style>
  .content {
    margin-top: 20px;
  }
  .decision {
    margin-top: 10px;
  }
</style>
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
  <form method="POST" action="/goals/{{ $goal->id }}">
     {{ csrf_field() }}
    <div class="content"> 
      <input type="hidden" name="_method" value="PUT">
      <h1>目標</h1>
      <input class="form-control form-control-lg" type="text" name="mark" placeholder="{{ $goal->mark }}">
    </div>
    <div class="content">
      <h1>現状</h1>
      <input class="form-control form-control-lg" type="text" name="now" placeholder="{{ $goal->now }}">
    </div>
    <div class="content">
      <h1>やること</h1>
      <input class="form-control form-control-lg" type="text" name="todo" placeholder="{{ $goal->todo }}">
    </div>
    <div class="decision">
    <button type="submit" class="btn btn-outline-primary">決定</button>
    </div>
</form>
<a href="/goals">戻る</a>
@endsection