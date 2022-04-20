<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <meta name="theme-color" content="#010101" />

    <title>{{ $title }}</title>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y0RG2KDLCZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){window.dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Y0RG2KDLCZ');
    </script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="pt-16 bg-a-gray text-white min-h-screen flex flex-col justify-between font-sans">
    <div class="">
        <nav class="fixed top-0 w-full rounded-b-3xl mb-6 z-50 bg-4down border border-t-0 border-black shadow-lg-center-black pb-1 pt-1.5">
            <div class="max-w-screen-lg mx-auto flex flex-row justify-between items-center px-3">
                <!-- logo -->
                <a href="{{ route('home_page') }}">
                    <img src="{{ asset('images/logo-navbar.png') }}" alt="logo apollo" class="h-14 py-1 px-2">
                </a>
                <!-- burger button  -->
                <button type="button" onclick="burgerButton(this)" class="no-double-tap-zoom space-y-2 sm:hidden py-2 px-2 transition-all ease-in-out duration-200">
                    <div id="l1" class="w-10 h-1 bg-gray-100 rounded-full transform transition-all ease-in-out duration-200"></div>
                    <div id="l2" class="w-10 h-1 bg-gray-100 rounded-full transform transition-all ease-in-out duration-200"></div>
                    <div id="l3" class="ml-auto w-7 h-1 bg-gray-100 rounded-full transform transition-all ease-in-out duration-400"></div>
                </button>

                <div class="hidden sm:block flex sm:flex-row space-x-3">
                    <a href="/soci/info" class="text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Tesseramento</a>
                    <a href="{{ route('rassegne.show', ['name' => 'racconti-dal-vero', 'festival' => 1]) }}" class="text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Racconti dal Vero</a>
                    <a href="{{ route('chi-siamo') }}" class="text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Chi Siamo</a>
                    <a href="{{ route('contatti') }}" class="text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Contatti</a>
                </div>
            </div>
            <div id="menu" class="w-full hidden flex-col flex transform space-y-4 justify-center text-center my-4">
                <a href="/soci/info" class="text-lg text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Tesseramento</a>
                <a href="{{ route('rassegne.show', ['name' => 'racconti-dal-vero', 'festival' => 1]) }}" class="text-lg text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Racconti dal Vero</a>
                <a href="{{ route('chi-siamo') }}" class="text-lg text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Chi siamo</a>
                <a href="{{ route('contatti') }}" class="text-lg text-a-blue hover:text-shadow-sm-blue active:text-a-orange active:text-shadow-sm-orange py-2 px-1">Contatti</a>
                <div class="w-full flex-row flex justify-center items-center gap-x-4 pt-2">
                    <a href="https://it-it.facebook.com/apollo.undici.31/">
                        <img src="{{ asset('images/facebook.png') }}" alt="Facebook icon" class="h-8">
                    </a>
                    <a href="https://www.instagram.com/apolloundici/">
                        <img src="{{ asset('images/instagram.png') }}" alt="Instagram icon" class="h-8 text-a-orange ">
                    </a>
                </div>
            </div>
        </nav>

        {{ $slot }}

    </div>

    <footer class="bg-3down mt-4 w-full h-60 border border-black shadow-lg-center-black rounded-tr-3xl rounded-tl-3xl">
        <div class="mt-8 mb-6 text-center">
            <h3 class="text-4xl text-a-orange text-shadow-sm-orange font-monoton">Apollo Undici</h3>
            <div class="flex flex-row justify-center gap-x-3 mt-8">
                <a href="https://it-it.facebook.com/apollo.undici.31/">
                    <img src="{{ asset('images/facebook.png') }}" alt="Facebook icon" class="h-12 text-a-yellow ">
                </a>
                <a href="https://www.instagram.com/apolloundici/">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram icon" class="h-12 text-a-yellow ">
                </a>
            </div>
            <div class="mt-6">
                <p class="text-gray-400 text-sm">© Apollo Undici. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
