@extends('layouts.memos')

@section('title', 'Sample_app')

@section('content')

<h3>編集ページ</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach  
        </ul>
    </div>
@endif

<form method="POST" action="/memos//{{ $memo->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
　　<div class="card border-primary mb-3" style="max-width: 20rem;" style="max-height: 40rem;">
      <div class="card-header">
        <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{old('title') == '' ? $memo->title : old('title') }}">
      </div>
      <div class="card-body text-primary">
        <p class="card-text">
          <textarea class="form-control" wrap="hard" rows="8" cols="50" name="content">{{old('content') == '' ? $memo->content : old('content') }}</textarea>
        </p>
        <input type="text" class="form-control" name="memo_date" value="{{old('memo_date') == '' ? $memo->memo_date : old('memo_date') }}">
      </div>
    </div>
    <button type="submit" class="btn btn-outline-primary">決定</button>
</form>

<a href="/memos/">戻る</a>
@endsection