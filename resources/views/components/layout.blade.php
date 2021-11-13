<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="css/app.css">
</head>
<body class="bg-a-gray">

    <nav class="w-full flex flex-row rounded-b-3xl justify-between items-center mb-6 py-1 px-5 bg-3down border-1 border-black shadow-lg-center-black">
        <a href="#"><img src="/images/logo-colori-alterati.png" alt="logo apollo" class="h-12"></a>
        <div class="space-y-2">
            <div class="w-10 h-1 bg-gray-100 rounded-full"></div>
            <div class="w-10 h-1 bg-gray-100 rounded-full"></div>
            <div class="w-10 h-1 bg-gray-100 rounded-full"></div>
        </div>
    </nav>

    {{ $slot }}

    <footer>

    </footer>

</body>
</html>
