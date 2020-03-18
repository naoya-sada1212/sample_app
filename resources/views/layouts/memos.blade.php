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
        background-color: #EFF8FE;
        font-weight: bold;
        border-bottom: solid 2px #E6E6E6 ;
    }
    p {
        color: #2E9AFE;
    }
    h1 {
        font-size: 30px;
        margin: 20px;
          
    }
    .container {
        left: 20px;
    }
    </style>
    
    </head>
    <body>
        @component('components.header')
        @endcomponent
        <div class="container">
            <h1>メモ一覧</h1>
            @yield('content')
        </div>
        
        @component('components.footer')
        @endcomponent
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>