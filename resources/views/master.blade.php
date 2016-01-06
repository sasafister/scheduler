<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-clockpicker.min.css') }}">
    {{--<link rel="stylesheet" href="http://adria.digital/zimo/css2.css">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/form-elements.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>

    {{--<script src="{{ asset('js/clockpicker.js') }}"></script>--}}
    <script src="{{asset('js/materialize.js')}}"></script>
    {{--<script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/scripts.js') }}"></script>--}}


</head>
<body>

    @include('navbar.index')

    <div class="container">
        @yield('content')
        @yield("footer")
    </div>

</body>

</html>
