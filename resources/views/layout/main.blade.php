<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{$page_title or 'Laravel examples'}}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('//fonts.googleapis.com/css?family=Lato:100') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}" />

    </head>
    <body>
        <div class="container-fluid">
            @include ('layout.html_body_header')
            <div class="content">
            @yield('content')
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/jquery-2.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/tree.js') }}"></script>
    </body>
</html>