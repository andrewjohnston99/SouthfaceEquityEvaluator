<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('token')
    <title>Southface Equity Evaluator - @yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('images/southface-ico.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

    @yield('css')
</head>
<body>

    @yield('content')

    <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

    @yield('js')
</body>
</html>
