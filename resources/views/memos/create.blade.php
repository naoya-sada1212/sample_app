@extends('layouts.layouts')

@section('title', 'Sample_app')

@section('content')
<h1>新しいメモ</h1>

<form method="POST" action="/memos">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail">タイトル</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" naem="title">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">内容</label>
        <textarea class="form-control" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">決定</button>
</form>

<a href="/memos">戻る</a>
@endsection