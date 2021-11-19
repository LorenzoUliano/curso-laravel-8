<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield("title") | {{ config('app.name') }}</title>
</head>
<body class="bg-gray-200">
    <header>
        
    </header>
    <div class="container px-4 mx-auto mt-10 content">
        @yield('content')
    </div>

</body>
</html>