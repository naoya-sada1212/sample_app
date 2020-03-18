@extends('layouts.goals')

@section('title', 'Sample_app')
<style>
  
  .decision {
    margin-top: 10px;
    margin-left: 30px;
  }
  .back {
    margin-left: 30px;
  }
  h1 {
    margin: 30px !important;
    margin-bottom: 0 !important;
  }
  .form {
    margin-left: 30px;
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
  <form method="POST" action="/goals//{{ $goal->id }}">
     {{ csrf_field() }}
     <input type="hidden" name="_method" value="PUT">
     <h1>目標</h1>
     <input class="form"  type="text" name="mark" style="width:700px; height:50px;" value="{{old('mark') == '' ? $goal->mark : old('mark') }}">
     <h1>現状</h1>
     <input class="form"  type="text" name="now" style="width:700px; height:50px;" value="{{old('now') == '' ? $goal->now : old('now') }}">
     <h1>やること</h1>
     <textarea class="form"  name="todo" style="width:700px; height:100px;">{{old('todo') == '' ? $goal->todo : old('todo') }}</textarea>
    
    <div class="decision">
      <button type="submit" class="btn btn-outline-primary">決定</button>
    </div>
  </form>
<a class="back" href="/goals">戻る</a>
@endsection