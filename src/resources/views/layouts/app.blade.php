<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title', config('app.name'))
    </title>

    <link rel="stylesheet" href="https://d3ov4xow0ip7nw.cloudfront.net/Materials/css/neumorphism.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    @section('header')
        <header class="neumorphism">
            <div class="app-title ">{{ config('app.name') }}</div>
        </header>
    @show
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
