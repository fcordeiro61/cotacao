<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!--
    <body class="font-sans antialiased">
-->
    <body>
        <!--
        <div class="min-h-screen bg-gray-100">
-->
        <!--
        <div class="h-screen flex flex-col">
            <div class="h-screen flex flex-col">
-->
            <!--
<div class="h-screen flex flex-col">
-->
            @include('layouts.header')
            @include('layouts.navigation')


            @if(View::hasSection('scroll'))
                <main class="list-container">
            @else
                <main class="main-container">
            @endif
            
            
            <!-- Page Content -->

            @if (View::hasSection('content'))
                @yield('content')
            @else
                {{ $slot }}
            @endif           
</main>
          
<!--
</div>
-->
            @include('layouts.footer')
            @vite(['resources/js/scroll.js'])        
        </div>


    </body>
</html>
