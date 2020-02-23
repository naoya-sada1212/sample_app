@extends('layouts.layouts')

@section('title', 'Sample_app')

@section('content')
<form method="POST" action="/memos//{{ $memo->id }}">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="title" value="{{ $memo->title }}">
    <input type="text" name="content" value="{{ $mempo->content }}">
    <input type="submit">
</form>
@endsection