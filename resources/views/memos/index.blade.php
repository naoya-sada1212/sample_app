<h1>Memos</h1>

@foreach($memos as $memo)
    <a href="/memos/{{ $memo->id }}">{{ $memo->title }}</a>
    <a href="/memos/{{ $memo->id }}/edit">編集</a>
    
    <form action="/memos/{{ $memo->id }}" method="POST" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else { return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit">消去</button>
    </form>
@endforeach

<a href="/memos/create">作成</a>