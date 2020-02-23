@extends('layouts.layouts')

@section('title', 'Sample_app')

@section('content')

<h1>編集ページ</h1>

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
    <div class="form-group">
        <label for="exampleInputEmail">タイトル</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{old('title') == '' ? $memo->title : old('title') }}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">メモ内容</label>
        <textarea class="form-control" name="content">{{old('content') == '' ? $memo->content : old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">決定</button>
</form>

<a href="/memos/{{ $memo->id }}">追加</a> |
<a href="/memos/">戻る</a>
@endsection