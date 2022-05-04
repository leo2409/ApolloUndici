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
    <script defer src="{{ asset('js/admin.js') }}"></script>
    <nav class="w-full bg-admin-gray border-b border-gray-300">
        <div class="flex flex-row space-x-4 justify-center items-center">
            <a href="{{ route('admin.film.index') }}" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/movie.png') }}" alt="'film icon" class="h-10"></a>
            <a href="{{ route('admin.rassegne.index') }}" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/cinema-screen.png') }}" alt="'rassegne icon" class="h-10"></a>
            <!--<a href="" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/movie-ticket.png') }}" alt="'film icon" class="h-10"></a>-->
            <!--<a href="{{ route('admin.soci.index') }}" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/request.png') }}" alt="'film icon" class="h-10"></a>-->
            <a href="{{ route('admin.profile.show') }}" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/astronaut.png') }}" alt="profile icon" class="h-10"></a>
            @if(Auth::guard('admin')->check() && Auth::guard('admin')->user()->big_boss)
                <a href="{{ route('admin.administrator.index') }}" class="py-1.5 px-2 hover:bg-gray-300"><img src="{{ asset('cms/images/admins.png') }}" alt="administrator icon" class="h-10"></a>
            @endif
        </div>
    </nav>
    {{ $slot }}
</body>
</html>
