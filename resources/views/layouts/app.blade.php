<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Movie App</title>
    @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white">
    @include('partials.header')
    @yield('app')
    @include('partials.footer')
    @livewireScripts
</body>

</html>
