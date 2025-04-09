<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Mamita') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-theme="light" class="w-full h-screen">
    @yield('content')
</body>

</html>
