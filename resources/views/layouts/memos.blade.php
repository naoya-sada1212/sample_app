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
      .container {
          left: 20px;
      }
    </style>
    
    </head>
    <body>
        @component('components.header')
        @endcomponent
        <div class="container">
            <div class="date">
            <?php 
              $date = date('Y/m/d');
              print_r($date);
            ?>
            </div>
            @yield('content')
        </div>
        
        @component('components.footer')
        @endcomponent
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>