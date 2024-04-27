<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/Lambang_TNI_AD.png') }}">
    <link rel="stylesheet" href="{{ asset('css/tni.css') }}">
    @vite('resources/css/app.css')
    <title>@yield('judul') | MCS</title>
</head>
<body>
    <div class="flex flex-row m-4 gap-2">
        @include('tni.sidebar')
        <div class="flex-1 overflow-x-auto flex-col">
            @include('tni.navbar')
            @yield('content')
        </div>
    </div>
</body>
</html>