@extends('layouts.memos')

@section('title', 'Sample_app')
<style>
  .create {
    font-size: 20px;
    margin-left: 20px;
    margin-bottom: 10px;
  }
  h1 {
        margin: 30px !important;
    }
</style>

@section('content')
<h1>メモ一覧</h1>
<div class="create">
  <a href="/memos/create">作成</a>
</div>


@foreach($memos as $memo)
<div class="main" style="float: left;">

<div class="container mx-o my-2">
  <div class="card border-primary mb-3" style="width: 20rem;" style="height: 40rem;">
    <div class="card-header">{{ $memo->title }}</div>
    <div class="card-body text-primary">
      <p class="card-text" wrap="hard" rows="8" cols="50">{{ $memo->content }}</p>
      <p class="card-text">{{ $memo->memo_date }}</p>

      
      <div class="d-flex" style="height: 36.4px;">
          <a href="/memos/{{ $memo->id }}/edit" class="btn btn-outline-primary">編集</a>
          <form action="/memos/{{ $memo->id }}" method="POST" onsubmit="if(confirm('削除しますか?')) { return true } else { return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-outline-danger">削除</button>
          </form>
      </div>
    </div>
  </div>
</div>
</div>

@endforeach
@endsection