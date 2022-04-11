<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <title>Admin - Apollo 11</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="">
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/admin.js') }}"></script>
    <nav class="w-full bg-admin-gray border-b border-gray-300">
        <div class="flex flex-row space-x-4 justify-center items-center">
            <a href="/admin/film" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/movie.png') }}" alt="'film icon" class="h-10"></a>
            <a href="/admin/rassegne" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/cinema-screen.png') }}" alt="'rassegne icon" class="h-10"></a>
            <a href="/admin/biglietteria" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/movie-ticket.png') }}" alt="'film icon" class="h-10"></a>
            <a href="/admin/soci" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/request.png') }}" alt="'film icon" class="h-10"></a>
            <a href="/admin/soci/search" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/zoom.png') }}" alt="'film icon" class="h-10"></a>
        </div>
    </nav>
    {{ $slot }}
</body>
</html>
