@extends('layouts.goals')

@section('title', 'Sample_app')

@section('content')
  <form method="POST" action="/goals">
     {{ csrf_field() }}
    <div class="content">  
      <h1>目標</h1>
        <input class="form-control form-control-lg" type="text" name="mark" placeholder="目標を入力してください">
    </div>
    <div class="content">
      <h1>現状</h1>
        <input class="form-control form-control-lg" type="text" name="now" placeholder="現状を入力してください">
    </div>
    <div class="content">
      <h1>やること</h1>
      <div class="form-row">
        <input class="form-control form-control-lg" type="text" name="todo" placeholder="やることを入力してください">
      </div>
    </div>
    <button type="submit" class="btn btn-outline-primary">決定</button>
  </div>
</form>
<a href="/goals">戻る</a>
@endsection
