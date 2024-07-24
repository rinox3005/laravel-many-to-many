<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield("title")</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- FontAwesome -->
        <script
            src="https://kit.fontawesome.com/7711c3f1fc.js"
            crossorigin="anonymous"
        ></script>
        <!-- Usando Vite -->
        @vite(["resources/js/app.js"])
    </head>

    <body>
        @include("shared.guest-nav")
        <div id="app">
            <main class="">
                @yield("content")
            </main>
        </div>
    </body>
</html>
