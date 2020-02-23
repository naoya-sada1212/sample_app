@if (session('message'))
    {{ session('message') }}
@endif

{{ $memo->title }}
{{ $memo->content }}

<a href="/memos/{{ $memo->id }}/edit">Edit</a>