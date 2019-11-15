<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Southface Equity Evaluator - @yield('title')</title>

    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">

    {{-- Include per-page css --}}
    @yield('css')
</head>
<body>
    @yield('content')




    {{-- Include per-page js --}}
    @yield('js')
</body>
</html>
