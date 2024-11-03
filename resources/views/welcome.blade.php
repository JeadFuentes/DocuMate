<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DocuMate</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])

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
                position: relative;
            }

            .overlay {
            background-color: rgba(0, 0, 0, 0.7); /* Dark overlay for readability */
            padding: 40px;
            border-radius: 10px;
            position: relative;
            z-index: 1;
            }
            .logo {
                position: absolute;
                top: 50px; /* Adjust the spacing from the top */
                left: 50%;
                transform: translateX(-50%);
                max-width: 150px; /* Adjust logo size as needed */
                z-index: 2;
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
        <img src="{{'/storage/images/DocuMate-t.png'}}" alt="Your Logo" class="logo">
        <div class="overlay">
            <h1>Streamline Your Business Permit Processing</h1>
            <p class="lead">Navigate the complexities of permits with ease and efficiency.</p>
            <a href="{{route("login")}}" class="btn btn-primary btn-lg">Start Your Process</a>
        </div>
    </body>
</html>
