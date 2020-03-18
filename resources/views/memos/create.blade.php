@extends('layouts.memos')

@section('title', 'Sample_app')

@section('content')
<h3>新しいメモ</h3>

@if ($errors->any())
    <div class="alert alert-danger col-4">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach  
        </ul>
    </div>
@endif
<form method="POST" action="/memos">
    {{ csrf_field() }}
    <div class="card border-primary mb-3" style="width: 20rem;" style="height: 40rem;">
      <div class="card-header">
          <input type="text" class="form-control" aria-describedby="emailHelp" name="title" value="{{ old('title') }}">
      </div>
      <div class="card-body text-primary">
        <p class="card-text">
          <textarea class="form-control" rows="8" cols="50" name="content">{{ old('content') }}</textarea>
        </p>
      </div>
      <input type="text" class="form-control" name="memo_date" value="<?php $date = date('Y-n-j'); print_r ($date); ?> ">
    </div> 
    <button type="submit" class="btn btn-outline-primary">決定</button>

</form>

<a href="/memos">戻る</a>
@endsection