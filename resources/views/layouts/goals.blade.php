<html>
    <head>
        <title>@yield('title')</title>
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <style>
     .header {
        width: 100%;
        height: 3rem;
        margin: 0;
        padding: 1rem;
        background-color: #EFF8FE;
        border-bottom: solid 2px #E6E6E6 ;
        font-weight: bold;
        font-family: 'Noto Sans JP', sans-serif !important;
        
      }
      p {
          color: #2E9AFE;
      }
      .container {
          left: 20px;
          font-family: 'Noto Sans JP', sans-serif !important;
      }
          
    </style>
    
    </head>
    <body>
        @component('components.header2')
        @endcomponent
        <div class="container">
            @yield('content')
        </div>
        
        @component('components.footer')
        @endcomponent
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>