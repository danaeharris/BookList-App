<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">   
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

            //When you type in the search input, update the search link.
            $( ".search" ).on("input", function() {
                $('.search-link').attr("href", "/search?q=" + $(this).val());
            });

            //When you hit the enter key on the searchbar, click the search link.
            $(".search").on('keypress',function(e) {
                if(e.which == 13) {
                    $('.search-link')[0].click();
                }
            });
    
        </script>
    </body>
</html>
