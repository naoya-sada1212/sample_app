@extends('layouts.calendar2')
@section('title','sample_app')

@section('content')
@foreach($memoDate as $memo)
<div class="container mx-o my-2">
  <div class="card border-primary mb-3" style="width: 20rem;" style="height: 40rem;">
    <div class="card-header">{{ $memo->title }}</div>
    <div class="card-body text-primary">
      <p class="card-text">{{ $memo->content }}</p>
      <p class="card-text">{{ $memo->memo_date }}</p>

      
      <div class="d-flex" style="height: 36.4px;">
          <a href="/memos/{{ $memo->id }}/edit" class="btn btn-outline-primary">編集</a>
          <form action="/memos/{{ $memo->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else { return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-outline-danger">削除</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endforeach
<a href="/memos" calss="btn btn-uotline-primary">戻る</a>
@endsection
