<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <style>
     .header {
        width: 100%;
        height: 3rem;
        margin: 0;
        padding: 1rem;
        background-color: #819ff7;
        font-weight: bold;
      }
      .date {
          font-size: 40px;
          font-weight: bold;
          margin: 20px;
          
      }
    </style>
    
<body>
<div class="header">
  <p>練習メモ</p>
</div>
<div class="container mx-0 my-2">
  <ul class="nav nav-tabs" class="justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="/memos">メモ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">予定表</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="/goals">目標</a>
    </li>
  </ul>
  <div class="main">
    <form method="POST" action="/goals">
      {{ csrf_field() }}
　　  <div class="content">  
　　  <p>目標</p>
        <input class="form-control form-control-lg" type="text" name="goal" placeholder="目標を入力してください">
      </div>
      <div class="content">
        <p>現状</p>
        <input class="form-control form-control-lg" type="text" name="now" placeholder="現状を入力してください">
      </div>
      <div class="content">
        <p>やること・期間</p>
        <div class="form-row">
          <input class="form-control form-control-lg" type="text" name="todo" placeholder="やるべきことを入力してください">
        </div>
      </div>
      </form>
    </div>
</div>
</body>
</html>
