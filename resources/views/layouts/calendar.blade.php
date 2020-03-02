<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
        
    <style>
     .header {
        width: 100%;
        height: 3rem;
        margin: 0;
        padding: 1rem;
        background-color: #819ff7;
        font-weight: bold;
      }
      .container {
          left: 20px;
      }
      .date {
          font-size: 40px;
          font-weight: bold;
          margin: 20px;
      }
      h3 {
        margin-bottom: 30px;
        margin-top: 20px;
      }
      th {
        height: 20px;
        text-align: center;
      }
      td {
        height: 80px;
      }
      .today {
        background: #E6E6E6;
      }
      th:nth-of-type(1), td:nth-of-type(1) {
        color: red;
      }
      th:nth-of-type(7), td:nth-of-type(7) {
        color: blue;
      }
          
    </style>
    
    </head>
    <body>
        @component('components.header')
        @endcomponent
        </div>
        <div class="container">
            @yield('content')
        </div>
        
        @component('components.footer')
        @endcomponent
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>