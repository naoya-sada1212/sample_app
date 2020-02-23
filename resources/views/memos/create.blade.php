@extends('layouts.layouts')

@section('title', 'Sample_app')

@section('content')
<form method="POST" action="/memos">
    {{ csrf_field() }}
    <input type="text" name="title">
    <input type="text" name="content">
    <input type="submit">
</form>
@endsection