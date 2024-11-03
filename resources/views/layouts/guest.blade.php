<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                margin: 0;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
                text-align: center;
                background-image: url('{{'/storage/images/bg-cover.jpg'}}'); /* Replace with your image URL */
                background-size: cover;
                background-position: center;
                background-repeat:no-repeat;
                position: relative;
            }
            .overlay {
            background-color: rgba(245, 243, 243, 1); /* Dark overlay for readability */
            padding: 50px;
            padding-left: 120px;
            padding-right: 120px;
            border-radius: 10px;
            position: relative;
            z-index: 1;
            }
            .logo {
                position: absolute;
                top: 40px; /* Adjust the spacing from the top */
                left: 50%;
                transform: translateX(-50%);
                max-width: 150px; /* Adjust logo size as needed */
                z-index: 1;
            }
            h1 {
                font-size: 3rem;
            }
            p {
                font-size: 1.25rem;
            }
        </style>
    </head>
    <body>
        <a href="/" wire:navigate>
            <img src="{{'/storage/images/DocuMate-t.png'}}" alt="Your Logo" class="logo">
        </a>
        
        <div class="overlay">
            {{ $slot }}
        </div>
    </body>
</html>
